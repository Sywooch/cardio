<?php
namespace app\components;

use Yii;

class Medview
{
    public $loginUrl;
    public $treeUrl;
    public $username;
    public $password;
    public $drArray;
    protected $docArray;

    public function init()
    {
        $this->login();
        Yii::$app->curl->init();
        return $this;
    }
    
    protected function login()
    {
        Yii::info(Yii::t('app', 'Trying to login'), 'medview');

        // Get login form
        $curl = Yii::$app->curl;
        $curl->setUrl($this->loginUrl);
        $response = $curl->get();

        $token = $this->scrapeFormToken($response);

        // login parameters
        $parameters = [
            '__EVENTTARGET' => '',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATE' => $token,
            'chkNight' => false,
            'txtUsername' => $this->username,
            'txtPassword' => $this->password,
            'rbtnLanguages' => 'nl',
            'btnLogin' => 'Aanmelden'
        ];

        // Login and store cookie
        $curl->setUrl($this->loginUrl);
        $curl->post($parameters);
    }

    public function getPatientIds()
    {
        $appointments = $this->getAppointments();
        $patientIds = [];
        foreach ($appointments as $appointment) {
            $patientIds[] = $appointment['pid'];
        }

        return array_unique($patientIds);
    }

    protected function getAppointments()
    {
        foreach ($this->drArray as $doctor) {
            // Getting main tree url page
            $response = Yii::$app->curl
                ->setUrl($this->treeUrl)
                ->get();

            $token = $this->scrapeFormToken($response);

            $parameters = [];
            $parameters['__ToolMain_State__'] = "";
            $parameters['__tvwViews_State__'] = "";
            $parameters['__VIEWSTATE'] = $token;
            $parameters['__EVENTTARGET'] = "btn_Appointement";
            $parameters['__EVENTARGUMENT'] = "";

            $response = Yii::$app->curl
                ->setUrl($this->treeUrl)
                ->post($parameters);

            $this->scrapeAppointments($response);

            $parameters = [];
            $token = $this->scrapeFormToken($response);
            $parameters['__ToolMain_State__'] = "";
            $parameters['__tvwViews_State__'] = "";
            $parameters['__VIEWSTATE'] = $token;
            $parameters['__EVENTARGUMENT'] = "";

            if (isset($this->docArray[$doctor])) {
                $tab = $this->docArray[$doctor];
                $event = "&__EVENTTARGET=_ctl0%3AdtaResources%3A_ctl".$tab."%3AbtnOpenResource";
                $response = Yii::$app->curl
                    ->setUrl($this->treeUrl)
                    ->post($parameters, $event);

                return $this->filterAppointments($response, $tab);
            }
        }

        return [];
    }

    protected function scrapeAppointments($content)
    {
        $subject = $content;
        $pattern = '/<a id=\"_ctl0_dtaResources__ctl([0-9]+)_btnOpenResource\" href=\"javascript:__doPostBack\(\'_ctl0\$dtaResources\$_ctl[0-9]+\$btnOpenResource\',\'\'\)\"\>(.*)<\/a>/';
        preg_match_all($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);

        $i = 0;
        foreach($matches[2] as $doc)
        {
            $this->docArray[$doc[0]] = $matches[1][$i][0];
            $i++;
        }
    }

    protected function scrapeFormToken($result)
    {
        $token = "__VIEWSTATE";
        $result = strstr($result, $token);
        $result = substr($result, strlen($token));
        $endpos = strpos($result, '" />');
        $token = substr($result, 9,$endpos-9);
        return $token;
    }

    protected function filterAppointments($content, $tab)
    {
        $subject = $content;
        if($tab == "OPNAME Heerlen" || $tab == "OPNAME Brunssum")
        {
            $pattern = '/<tr class=\"gridItem\">[[:space:]]+ *<td> *([0-9\:]+)<\/td><td> *[[:space:]]+ *<a href=\"aspxMain.aspx\?patCode=[0-9]+&patName=([a-zA-Z]+)&patFname=([a-zA-Z]+)\" target=\"viewer\">([a-zA-Z \&\;]*)<\/a> *[[:space:]]+ *<\/td><td>([a-zA-Z0-9]*)<\/td><td>([a-zA-Z0-9]*)<\/td><td>([a-zA-Z0-9]*)<\/td>/';
        }else{
            $pattern = '/<tr class=\"gridItem\">[[:space:]]+ *<td> *([0-9\:]+)<\/td><td> *[[:space:]]+ *<a onClick=\"top\.viewer\.location\.href=\'aspxMain\.aspx\?patCode=([0-9]*)&patName=([a-zA-Z ]+)&patFname=([a-zA-Z ]*)&txtFrameWidth=\'\+ top\.viewer\.document\.body\.clientWidth\" style=\"cursor\:hand;\">([a-zA-Z \;\&]+)<\/a>/';
        }
        preg_match_all($pattern, $subject, $matches, PREG_OFFSET_CAPTURE);

        if($tab == "OPNAME Heerlen"){
            $i = 0;
            $appointments = [];
            foreach($matches[1] as $appointment)
            {
                $appointments[$i]['pid'] 	= $appointment[0];
                $appointments[$i]['naam'] 	= $matches[2][$i][0];
                $appointments[$i]['voorletters'] 	= $matches[3][$i][0];
                $appointments[$i]['naam_voluit']= $matches[4][$i][0];
                $appointments[$i]['afdeling'] = $matches[5][$i][0];
                $appointments[$i]['test'] = $matches[6][$i][0];
                $appointments[$i]['test1'] = $matches[7][$i][0];
                $i++;
            }
            return $appointments;
        }else{
            $i = 0;
            $appointments = [];
            foreach($matches[1] as $appointment)
            {
                $appointments[$i]['tijd'] 	= $appointment[0];
                $appointments[$i]['pid'] 	= $matches[2][$i][0];
                $appointments[$i]['naam'] 	= $matches[3][$i][0];
                $appointments[$i]['voornaam']= $matches[4][$i][0];
                $appointments[$i]['naam_voluit'] = $matches[5][$i][0];
                $i++;
            }
            return $appointments;
        }
    }

}
