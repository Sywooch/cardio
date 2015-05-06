<?php

namespace app\components;

use Yii;

class ClinicalAssistant
{
    protected $pid;

    public $baseUrl;

    public $httpAuth;

    public $userPwd;

    public function setPid($pid)
    {
        $this->pid = $pid;

        // Login
        Yii::$app->curl
            ->setUrl($this->baseUrl . "rvc-ca-epd/studies.asp?patientnummer=" . $this->pid)
            ->get();
    }

    protected function getDataArr()
    {
        $dataArr = [];

        $response = Yii::$app->curl
            ->setUrl($this->baseUrl . "rvc-ca-epd/XML/getData.asp")
            ->post([
                    'FieldName' => 'Patientnummer',
                    'Level' => 1,
                    'Value' => $this->pid,
                    'rndval' => '1321611967257',
                ]);

        preg_match_all("/<Studie display=\"hidden\">(.*)<\/Studie>/", $response, $sresults);
        preg_match_all("/<Studie_Type_>(.*)<\/Studie_Type_>/", $data, $stresults);
        preg_match_all("/<Studiedatum>(.*)<\/Studiedatum>/", $data, $dresults);

        for($i = 0; $i < count($sresults[1]); $i++){
            $dataArr[$i]['study'] = $sresults[1][$i];
            $dataArr[$i]['type'] = $stresults[1][$i];
            $dataArr[$i]['datum'] = $dresults[1][$i];
        }

        return $dataArr;
    }

    public function collectEcgFiles()
    {
        return $this->collectFiles('ECG');
    }

    public function collectXEcgFile()
    {
        return $this->collectFiles('Ergometrie');
    }

    protected function collectFiles($type)
    {
        $pdfs = [];
        foreach ($this->getDataArr() as $study) {
            if($study['type'] == $type){

                $xml = $this->getStudy($study['study']);
                preg_match_all("/<Serie display=\"hidden\">(.*)<\/Serie>/", $xml, $results);
                $serieId = $results[1][0];

                $bestandXML = $this->getBestandsXml($serieId);

                preg_match_all("/location=\"(.*)\" contenttype/", $bestandXML, $results);

                /* make a 6date */
                $dateTimeExp = explode(' ',$study['datum']);
                $date = $dateTimeExp[0];
                $dateExpl = explode("-",$date);
                $day = $dateExpl[0];
                $month = $dateExpl[1];
                $year = substr($dateExpl[2], 2, 2);
                $sixdate = $day.$month.$year;
                /* end make a 6date */

                $fileUrl = $results[1][0];

                $dir = $type === 'ECG' ? 'ecg' : 'xecg';

                if (false !== strpos($fileUrl, 'pdf')) {
                    $pdfs[] = $this->savePdf($this->getPdf($fileUrl), $dir, $sixdate . '.pdf');
                }
            }
        }

        return $pdfs;
    }

    protected function getStudy($studyId)
    {
        $response = Yii::$app->curl
            ->setUrl($this->baseUrl . "rvc-ca-epd/XML/getData.asp")
            ->httpBasicAuth($this->userPwd)
            ->post([
                    'Level' => '2',
                    'FieldName' => 'Studie',
                    'Value' => $studyId,
                    'rndval' => '1321611967257',
                ]);

        return $response;
    }

    protected function getBestandsXml($value)
    {
        $response = Yii::$app->curl
            ->setUrl($this->baseUrl . "rvc-ca-epd/XML/getData.asp")
            ->httpBasicAuth($this->userPwd)
            ->post([
                    'Level' => 3,
                    'FieldName' => 'Serie',
                    'Value' => $value,
                    'rndval' => '123441551231',
                ]);
        return $response;
    }

    protected function getPdf($url)
    {
        $url = str_replace('http://srw-caw-01/', $this->baseUrl, $url);
        $response = Yii::$app->curl
            ->setUrl($url)
            ->httpBasicAuth($this->userPwd)
            ->get();

        return $response;
    }

    protected function savePdf($content, $map, $fileName)
    {
        $brievenMap = Yii::$app->params['brievenMap'];
        $patientMap = $brievenMap . $this->pid;
        $ecgMap 	= $patientMap . "/" . $map;
        $fileName	= $ecgMap . "/" . $fileName;

        if (!is_dir($patientMap)) {
            mkdir($patientMap);
        }

        if(!is_dir($ecgMap)){
            mkdir($ecgMap);
        }

        file_put_contents($fileName, $content);

        return $fileName;
    }

}
