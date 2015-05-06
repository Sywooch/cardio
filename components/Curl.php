<?php

namespace app\components;

use Yii;

/**
 * Class Curl
 * Creates curl connection and sends get or post requests
 * Usage:
 *  $curl = Yii::$app->curl;
 *  $curl->setUrl('http://example.com');
 *  $data = $curl->get(); or $data = $curl->post(['user' => 'anonymous']);
 */
class Curl extends \yii\base\Object
{
    protected $curlConnection;

    /**
     * @var string Url we are sending request to - used mostly for logging
     */
    protected $url;

    /**
     * @var string
     */
    public $userAgent;

    /**
     * @var int
     */
    public $connectTimeout;

    /**
     * @var string Path to cookie file
     */
    public $cookieFile;

    public function init()
    {
        $this->initCurl();
        return $this;
    }

    protected function initCurl()
    {
        $this->curlConnection = curl_init();
        curl_setopt($this->curlConnection, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($this->curlConnection, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
        curl_setopt($this->curlConnection, CURLOPT_COOKIEFILE, Yii::getAlias($this->cookieFile));
        curl_setopt($this->curlConnection, CURLOPT_COOKIEJAR, Yii::getAlias($this->cookieFile));
        curl_setopt($this->curlConnection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curlConnection, CURLOPT_FOLLOWLOCATION, 1);
    }
    /**
     * Set url for curl
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        curl_setopt($this->curlConnection, CURLOPT_URL, $url);
        $this->url = $url;
        return $this;
    }

    /**
     * Set http basic auth user and password
     *
     * @param string $userPwd user:password for the connection
     * @return $this
     */
    public function httpBasicAuth($userPwd)
    {
        curl_setopt($this->curlConnection, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($this->curlConnection, CURLOPT_USERPWD, $userPwd);
        return $this;
    }

    /**
     * Send get request
     *
     * @return string
     */
    public function get()
    {
        $response = curl_exec($this->curlConnection);
        return $response;
    }

    /**
     * Send post request
     *
     * @param array $postParameters
     * @param string $encodedParameters string containing additional parameters to be sent with post
     *
     * @return string Resulting page
     */
    public function post($postParameters, $encodedParameters = '')
    {
        $postParameters = $this->convertPostParameters($postParameters);
        $allParameters = $postParameters . $encodedParameters;

        // Log request
        Yii::info(
            Yii::t(
                'app',
                'Sending post request to {url}, with {parameters}',
                ['url' => $this->url, 'parameters' => $allParameters]
            ),
            'curl'
        );

        curl_setopt($this->curlConnection, CURLOPT_POST, 1);
        curl_setopt($this->curlConnection, CURLOPT_POSTFIELDS, $allParameters);
        $response = curl_exec($this->curlConnection);

        if ($this->containsValidationErrors($response)) {
            Yii::error(Yii::t('app', 'There are validation errors'), 'curl');
        } else {
            Yii::info(Yii::t('app', 'Request successful'), 'curl');
        }

        return $response;
    }

    /**
     * Convert post array parameters to request string
     *
     * @param array $postParameters
     * @return string Converted postParameters into string
     */
    protected function convertPostParameters($postParameters)
    {
        $parameters = [];
        foreach ($postParameters as $key => $value) {
            $encodedValue = urlencode($value);
            $parameters[] = "$key=$encodedValue";
        }

        return implode('&', $parameters);
    }

    /**
     * Check if response contains any validation errors
     *
     * @param $response
     * @return boolean
     */
    protected function containsValidationErrors($response)
    {
        return (bool) strpos($response,"Value was invalid");
    }

}
