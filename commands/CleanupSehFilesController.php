<?php

namespace app\commands;

//use app\modules\admin\models\Patient;
use Yii;
use yii\console\Controller;

/**
 * Read pids from dir and scrape patient from external resource
 */
class CleanupSehFilesController extends Controller {

    public function actionIndex() {
        $pids = Yii::$app->pidReader
                ->readPids()
                ->getPids();

        $wrongDates = array('1209',
            '0110', '0210', '0310', '0410', '0510', '0610', '0710', '0810', '0910', '1010', '1110', '1210',
            '0111', '0211', '0311', '0411', '0511', '0611', '0711', '0811', '0911', '1011', '1111', '1211',
            '0112', '0212', '0312', '0412', '0512', '0612', '0712', '0812', '0912', '1012', '1112', '1212',
            '0113', '0213', '0313', '0413', '0513', '0613', '0713', '0813', '0913', '1013', '1113', '1213',
            '0114', '0214', '0314', '0414', '0514', '0614', '0714', '0814', '0914', '1014');

        foreach ($pids as $pid) {
            $sehDir = 'd:\\' . $pid . '\\seh';

            if (is_dir($sehDir)) {
                $files = scandir($sehDir);

                foreach ($files AS $file) {

                    $source = $sehDir . '\\' . $file;
                    
                    $date = preg_replace('/.*([0-9]{4})\.htm.*/si', '$1', $file);
                    if (in_array($date, $wrongDates)) {

                        // remove whitespace before filename
                        if (preg_match('/ .*/', $file)) {
                            $newFile = preg_replace('/ (.*)/si', '$1', $file);
                            $dest = $sehDir . '\\' . $newFile;
                            echo $source . ' -> ' . $dest . PHP_EOL;
                            copy($source, $dest);
                            unlink($source);
                        }

                        // remove dash before filename
                        if (preg_match('/-.*/', $file)) {
                            $newFile = preg_replace('/-(.*)/si', '$1', $file);
                            $dest = $sehDir . '\\' . $newFile;
                            echo $source . ' -> ' . $dest . PHP_EOL;
                            copy($source, $dest);
                            unlink($source);
                        }
                        
                        // if there is only a 6date, check if we can give it a prefix
                        if (preg_match('/^[0-6]{6}\./', $file)) {
                            
                            $sixData = preg_replace('/([0-6]{6})\..*/', '$1', $file);
                            $content = file_get_contents($source);
                            $treatingSpeciality = $this->getSpeciality($content);
                            if ($treatingSpeciality === '') {
                                $treatingSpeciality = $this->getReferencedSpeciality($content);
                            }
                            
                            $newFile = str_replace('Maak', 'Onve', substr($treatingSpeciality, 0, 4)) . $sixData . '.html';
                            $dest = $sehDir . '\\' . $newFile;
                            
                            copy($source, $dest);
                            if (strlen($treatingSpeciality) > 0) {
                                echo $source . ' -> ' . $dest. PHP_EOL;
                                unlink($source);
                            }
                        }
                    }
                }
            }
        }
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
        $content = substr($content, 0, stripos($content, '</td>'));
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

}
