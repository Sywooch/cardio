<?php

namespace app\components;

use app\models\SehVisits;
use Yii;

/**
 * Emergency information collector
 * collects files from remote server about emergency patients arrival
 * and stores some of the info in the database
 */
class SehFileCollector extends \yii\base\Object
{
    /**
     * @var string remote folder path
     */
    public $remotePath;

    /**
     * @var boolean Specifies the type of directory separator for remote
     */
    public $remoteDirectorySeparator = '/';

    /**
     * @var string temporary folder path. This is where files are placed after 
     * being listed from remote folder
     */
    public $temporaryPath;

    /**
     * @var string the path where files will be stored after all manipulations
     */
    public $storePath;

    /**
     * @var string Specify directory serparator for temporary and store folders
     */
    public $localDirectorySeparator = DIRECTORY_SEPARATOR;

    /**
     * Initialize all pathes by replacing all aliases in pathes
     */
    public function init()
    {
        parent::init();
        $this->remotePath = Yii::getAlias($this->remotePath);
        $this->temporaryPath = Yii::getAlias($this->temporaryPath);
        $this->storePath = Yii::getAlias($this->storePath);
    }

    /**
     * Check out last stored files on the remote server and copy new files to 
     * temporary folder
     */
    public function checkoutRemoteFolder($date)
    {
        $remotePath = $this->composeFilepath($this->remotePath, $date, $this->remoteDirectorySeparator);
        $files = scandir($remotePath);

        foreach ($files as $file) {
            Yii::info("Processing file $file", 'collector');
            $remoteFilePath = $this->composeFilepath($remotePath, $file, $this->remoteDirectorySeparator);
            $tempPath = $this->composeFilepath($this->temporaryPath, $file);
            if (is_dir($remoteFilePath)) {
                continue;
            }
            
            if (pathinfo($remoteFilePath, PATHINFO_EXTENSION) != 'htm') {
                Yii::info("$file has not the right extension", 'collector');
                continue;
            }
            
            if (!$this->checkFileIsProper($remotePath, $file)) {
                Yii::info("$file is inproper", 'collector');
                continue;
            }

            if (!$this->checkFileIsModified($remotePath, $file)) {
                Yii::info("$file already present in database", 'collector');
                continue;
            }
            
            $filenameInfo = explode("-", $file);
            if (strlen($filenameInfo[1]) < 7) {
                Yii::info("$file the pid is not correct", 'collector');
                continue;
            }

            if (copy($remoteFilePath, $tempPath)) {
                $record = SehVisits::find()
                    ->where(['filename' => $file])
                    ->one();
                
                if (!$record) {
                    $record = new SehVisits();
                    $record->filename = $file;
                }

                // Updating database
                $mtime = filemtime($remoteFilePath);
                $record->mtime = (string) $mtime;

                $record->save();
            }
        }

        return $this;
    }

    /**
     * Checks all files in temporary folder and updates database records about 
     * it
     */
    public function checkoutTemporaryFolder()
    {
        $files = scandir($this->temporaryPath);

        foreach ($files as $file) {
            $path = $this->composeFilepath($this->temporaryPath, $file);

            if (is_dir($path)) {
                continue;
            }

            $filenameInfo = explode("-", $file);
            $typeOfTreatment = $filenameInfo[2];
            $pid = $filenameInfo[1]; 
            $emergencyId = str_replace('.htm', '', strtolower($filenameInfo[4]));
            $date = $filenameInfo[0];

            $fileData = SehVisits::find()
                ->where(['filename' => $file])
                ->one();

            if (!$fileData) {
                $fileData = new SehVisits();
                $fileData->filename = $file;
            }

            $fileData->pid = $pid;
            $fileData->type_of_treatment = $typeOfTreatment;
            $fileData->emergency_id = $emergencyId;
            
            $sixDate =  substr($date, 0, 4) . substr($date, 6, 2);
            $arrivalDate = substr($date, 4, 4) . substr($date, 2, 2) . substr($date, 0, 2);
            $fileData->date = date('Y-m-d', strtotime($arrivalDate . ' 00:00'));
            
            if ($typeOfTreatment === '81100') {
                // Working with file content
                $content = file_get_contents($path);

                $treatingSpeciality = $this->getSpeciality($content);
                if ($treatingSpeciality === '') {
                    $treatingSpeciality = $this->getReferencedSpeciality($content);
                }
                $arrivalTime = $this->getArrivalTime($content);
                $departureDate = $this->getDepartureDate($content);
                $treatingSpecialityDisabled = intval($this->getTreatingSpecialityDisabled($content));

                $arrivalDateTime = strtotime($arrivalDate . ' ' . $arrivalTime);
                $difference = (strtotime('now') - $arrivalDateTime) / 3600;

                if ($treatingSpecialityDisabled) {
                    $patientHandled = 'handlel';
                } else if ($departureDate != "" && $departureDate != "?") {
                    $patientHandled = 'left';
                } else if ($difference > 10) {
                    $patientHandled = 'unsettled';
                } else {
                    $patientHandled = 'stillEmergency';
                }

                $fileData->arrival_date = $arrivalDate;
                $fileData->departure_date = $departureDate;
                $fileData->treating_speciality = $treatingSpeciality;
                $fileData->treating_speciality_disabled = intval($treatingSpecialityDisabled);
                $fileData->emergency_status = $patientHandled;

                // Creating destination folder
                $ds = $this->localDirectorySeparator;
                $storeFolder = $this->storePath . $ds . $pid . $ds . 'seh';
                if (!is_dir($storeFolder)) {
                    mkdir($storeFolder, 0777, true);
                }

                // Copy file to store folder
                $storeFileName = str_replace('Maak', 'Onve', substr($treatingSpeciality, 0, 4)) . $sixDate . '.html';
                $storeFilepath = $this->composeFilepath($storeFolder, $storeFileName, $this->localDirectorySeparator);
                file_put_contents($storeFilepath, $content);
                
            }
            // Remove temporary file
            unlink($this->composeFilepath($this->temporaryPath, $file));

            $fileData->save();
        }
    }

    /**
     * Check whether has correct filename and filesize
     * @param string $path
     * @param string $filename
     * @return boolean
     */
    protected function checkFileIsProper($path, $filename)
    {
        return (filesize($this->composeFilepath($path, $filename, $this->remoteDirectorySeparator)) > 8000 
                && filesize($this->composeFilepath($path, $filename, $this->remoteDirectorySeparator)) < 1000000
                && strlen($filename) > 4);
    }

    /**
     * Check whether file already present in database or was not modified
     * @param string $path
     * @param string $filename
     * @return boolean
     */
    protected function checkFileIsModified($path, $filename)
    {
        $presentFile = SehVisits::find()
            ->where(['filename' => $filename])
            ->one();

        if ($presentFile) {
            $mtime = filemtime($this->composeFilepath($path, $filename, $this->remoteDirectorySeparator));
            if ($presentFile->mtime == $mtime) {
                return false;
            }

            return true;
        }

        return true;
    }

    /**
     * Compose filepath out of directory path and filename
     * @param string $dirPath
     * @param string $filename
     * @param string|null $directorySeparator
     * @return string composed filepath
     */
    protected function composeFilepath($dirPath, $filename, $directorySeparator = null)
    {
        if (!$directorySeparator) {
            $directorySeparator = $this->localDirectorySeparator;
        }
        return $dirPath . $directorySeparator . $filename;
    }

    /**
     * Parse content and get treating speciality
     * @param string $content
     * @return string speciality
     */
    protected function getSpeciality($content)
    {
        $start = stripos($content, 'id="behandelendspecialisme"');
        if (!is_integer($start)) {
            $start = stripos($content, 'id=behandelendSpecialisme');
        }
        $content = substr($content, $start);
        $content = substr($content, 0, stripos($content, '</TD>'));
        $speciality = preg_replace('/.*\<input .*value=\"([a-zA-Z ]*)\".*/si','$1', $content);
        
        if (strlen($speciality) > 30) {
            $speciality = preg_replace('/.*\<input .*value=([a-zA-Z]*) .*/si','$1', $content);
        }
        
        if (strlen($speciality) > 30) {
            $speciality = preg_replace('/.*selected\"\>([a-zA-Z]*).*/si','$1', $content);
        }
        
        return (preg_match('/^[a-zA-Z ]*$/', $speciality))? $speciality : '';
    }
    
    public function getReferencedSpeciality($content)
    {
        $start = stripos($content, 'id="verwezenSpecialisme"');
        if (!is_integer($start)) {
            $start = stripos($content, 'id=verwezenSpecialisme');
        }
        
        $content = substr($content, $start);
        $content = substr($content, 0, stripos($content, '</TD>'));
        $speciality = preg_replace('/.*\<OPTION.* selected>([a-zA-Z ]*)<.*/si','$1', $content);
        return (preg_match('/^[a-zA-Z ]*$/', $speciality))? $speciality : '';
    }

    /**
     * Get Arrival time from emergency file content
     * @param string $content
     * @return string
     */
    protected function getArrivalTime($content)
    {
        $beginString = '<STRONG>Aankomsttijd:&nbsp;&nbsp;<FONT size=2><STRONG>';
        $endString = '</STRONG></FONT></STRONG></FONT></SPAN></TD></TR></TBODY></TABLE><TD class=noprint>';
        $arrival = $this->getParameterValue($beginString, $endString, $content);
        $arrival = str_replace('uur', '', $arrival);
        $arrival = str_replace('&nbsp;', '', $arrival);

        return trim($arrival);
    }

    /**
     * Get departure date from emergency file content
     * @param string $content
     * @return string
     */
    protected function getDepartureDate($content)
    {
        $departure = "";
        if (is_integer(strpos($content, 'tabIndex=5 maxLength=4 size=1 value='))) {
            $beginString = 'tabIndex=5 maxLength=4 size=1 value=';
            $endString = ' border=0 name=vertrektijd>';
            $departure = $this->getParameterValue($beginString, $endString, $content);
        }
        return $departure;
    }

    protected function getTreatingSpecialityDisabled($content)
    {
        $beginString = '<SELECT id=behandelendSpecialisme';
        $endString = 'tabIndex=13 name=b12c96nfverwijs>';
        $disabled = $this->getParameterValue($beginString, $endString, $content);

        return preg_match('/disables/', $disabled);
    }

    /**
     * Get parameter value from content placed between start and end strings
     * @param string $beginString
     * @param string $endString
     * @param string $content
     * @return string
     */
    protected function getParameterValue($beginString, $endString, $content)
    {
        $start = strpos($content, $beginString);
        $end = strpos($content, $endString);
        $innerString = str_replace($beginString, "", substr($content, $start, $end - $start));
        return $innerString;
    }

}