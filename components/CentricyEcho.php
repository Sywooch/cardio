<?php

namespace app\components;

class CentricyEcho
{
    protected $pid;
    protected $ch;
    protected $content;

    public $BASEURL;
    public $USERAGENT;
    public $HTTPAUTH;
    public $USERPWD;

    protected $MONTHS = array('jan'=>'01','feb'=>'02','mar'=>'03','apr'=>'04','may'=>'05','jun'=>'06','june'=>'06','jul'=>'07','july'=>'07','aug'=>'08','sep'=>'09','sept'=>'09','oct'=>'10','nov'=>'11','dec'=>'12');

    function init()
    {
        $this->ch = curl_init();
    }

    /**
     * Init echo for patient
     */
    function pidInit($pid)
    {
        $this->pid = $pid;
        $this->content = $this->login();
    }

    function setConnection($url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_USERAGENT, $this->USERAGENT);
        curl_setopt($this->ch, CURLOPT_HTTPAUTH, $this->HTTPAUTH);
        curl_setopt($this->ch, CURLOPT_USERPWD, $this->USERPWD);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        return curl_exec($this->ch);
    }

    function login()
    {
        return $this->setConnection($this->BASEURL."TestPage.asp?queryURL=%2Fsearchpage.asp&filterLast=&filterFirst=&pid=".$this->pid."&lastName=&firstName=&submit1=Search&Server1=on");
    }

    /**
     * Geeft array terug van unieke links in overzicht
     *
     * @return Array met originele datum en url
     */
    function getItemsLinks()
    {
        preg_match_all("/HREF=\"(.*)\"/",$this->content, $result);
        preg_match_all("/([0-9]{2})-([a-zA-Z]{0,10})-([0-9]{4})\&nbsp\&nbsp\&nbsp([0-9]{2}):([0-9]{2}):([0-9]{2})/",$this->content, $dateResult);

        $linkArray = array();
        $i = 0;
        foreach($result[1] AS $item){
            if(!in_array($item,$linkArray)){
                $linkArray[$this->dateArrayToTimestamp($dateResult,$i)] = $item;
                $i++;
            }
        }
        return (array) $linkArray;
    }

    /** 
     * Geeft array terug van reports van een bepaalde datum 
     *
     * @param string $itemUrl pad waar de reports staan
     * @return Array
     */
    function getReports($itemUrl)
    {
        $this->content = $this->setConnection($this->BASEURL.$itemUrl);
        preg_match_all("/HREF\=\'(.*)\'><IMG SRC\=\'Images\/reportIcon\.jpg\'><\/a>/", $this->content,$reports);
        return $reports[1];
    }

    /**
     * Geeft url terug van laatste report
     *
     * @param Array report urls
     * @return string
     */
    function getLastReport($reportUrlArray)
    {
        $reportArray = array();
        foreach($reportUrlArray AS $report) {
            preg_match("/date=(.*)&mod/",$report,$result);
            $dateRaw = urldecode($result[1]);
            list($dag,$maand,$rest) = explode("-",$dateRaw);
            list($rest,$minuten,$seconden) = explode(":",$rest);
            list($jaar,$uur) = explode(" ",$rest);
            $timestamp = strtotime("$jaar-$maand-$dag $uur:$minuten:$seconden");
            $reportArray[$timestamp] = $report;
        }
        krsort($reportArray);
        return array_shift($reportArray);
    }

    function saveReportAsPdf($reportUrl, $savePath)
    {
        $this->content = $this->setConnection($this->BASEURL.$reportUrl);

        $token = 'SRC="';
        $result = strstr($this->content, $token);
        $result = substr($result, strlen($token));
        $endpos = strpos($result, '">');
        $pdfUri = substr($result, 0,$endpos);

        $pdf = $this->setConnection($this->BASEURL.$pdfUri);
        if(strpos($pdf,'HTML') === false && strpos($pdf,'FWS') === false && !strpos($pdf,'Invalid')){

            if (!$handle = fopen($savePath, 'w')) 
            {
                exit;
            }

            if (!fwrite($handle, $pdf)) 
            {
                exit;
            }
            fclose($handle);
        }
    }


    /**
     * converteer multidimionale date array naar datum
     *
     * @param array $dataArray
     * @param int $nr
     * @return string datum
     */
    function dateArrayToTimestamp($dateArray,$nr)
    {
        list($dag,$maand,$jaar,$uur,$minuten,$seconden) = array($dateArray[1][$nr],$dateArray[2][$nr],$dateArray[3][$nr],$dateArray[4][$nr],$dateArray[5][$nr],$dateArray[6][$nr]);
        $maand = $this->MONTHS[strtolower($maand)];
        return strtotime("$jaar-$maand-$dag $uur:$minuten:$seconden");
    }

}
