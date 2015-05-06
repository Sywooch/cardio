<?php

namespace app\components;

use app\modules\admin\models\GeneralPractitioner;

use yii\base\Object;
use yii\base\ErrorException;
use Yii;

use yii\helpers\HtmlPurifier;

class PatientScraper extends Object
{

    /**
     * Url patients are parsed from
     */
    public $urlTemplate = null;

    protected $_content = null;

    protected $_document = null;

    protected $_xpath = null;

    /**
     * @var boolean Whether loaded document contains errors in markup
     */
    protected $_haveDomErrors = false;

    /**
     * Final scraped attributes
     */
    protected $attributes = [];

    protected static $oldAttributes = [
        'patienten_nr' => 'pid',
        'naam' => 'name',
        'bsn_nummer' => 'bsn',
        'geslacht' => 'sex',
        'geboortedatum' => 'birth_date',
        'straat' => 'address',
        'postcode' => 'zip_code',
        'plaats' => 'city',
        'land' => 'country',
        'telefoon' => 'phone',
        'meisjesnaam' => 'maiden_name',
        'is_overleden' => 'died',
        'overleden_op' => 'died_at',
        'huisarts' => 'general_practitioner_id',
        'verzekering' => 'insurance',
    ];

    protected function initDOM($patientNum)
    {
        $url = $this->replacePatientId($this->urlTemplate, $patientNum);
        $this->_content = file_get_contents(Yii::getAlias($url));
        $this->createDocument();
        $this->createXPath();
    }

    protected function createDocument()
    {
        try {
            $this->_document = new \DOMDocument();

            // Clean up content
            $content = HtmlPurifier::process($this->_content);

            $this->_document->loadHTML($content);
        } catch (ErrorException $e) {
            $this->_haveDomErrors = true;
        }
    }

    protected function createXPath()
    {
        $this->_xpath = new \DOMXPath($this->_document);
    }

    /**
     * Replace patient id from urlTemplate
     *
     * @param string $urlTemplate
     * @param int $patientId
     *
     * @return string
     */
    protected function replacePatientId($urlTemplate, $patientId)
    {
        return str_replace('{patientId}', $patientId, $urlTemplate);
    }

    /**
     * Scrape patient by specified patient number
     *
     * @param string $patientNum
     * @return PatientScraper $this
     */
    protected function scrape($patientNum)
    {
        $this->initDOM($patientNum);

        if ($this->_haveDomErrors) {
            $this->attributes = [];
            return $this;
        }

        $xquery = '//table/tr';
        $nodes = $this->_xpath->query($xquery);

        if (!$nodes->length) {
            $xquery = '//table/tbody/tr';
            $nodes = $this->_xpath->query($xquery);
        }

        $attributes = [];
        for ($i = 0; $i < $nodes->length; $i++) {
            $itemNode = $nodes->item($i);
            $itemNodes = $this->_xpath->query('.//td', $itemNode);
            $caption = $itemNodes->item(0)->nodeValue;
            $value = $itemNodes->item(1)->nodeValue;

            $caption = $this->prepareDbField($caption);

            if ($caption) {
                $attributes[$caption] = $value;
            }
        }

        $attributes = $this->optimizeAttributes($attributes);

        $attributes = $this->translateAttributes($attributes);

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Incapsulates logic of scraping attributes, scraping and storing 
     * physician
     *
     * @param string $patientNum
     * @return PatientScrape $this
     */
    public function scrapeAndStorePhysician($patientNum)
    {
        $this->scrape($patientNum);
        $attributes = $this->attributes;

        if ($attributes) {
            // Scraping general practitioner first
            $oldGeneralPractitionerId = $attributes['general_practitioner_id'];
            $generalPractitioner = GeneralPractitioner::find()
                ->where(['code' => $oldGeneralPractitionerId])
                ->one();
            
            if ($generalPractitioner) {
                $generalPractitionerId = $generalPractitioner->id;
            } else {
                $phAttributes = Yii::$app->physicianScraper
                    ->scrape($patientNum, $attributes['general_practitioner_id'])
                    ->getAttributes();

                if ($phAttributes) {
                    $genPractModel = new GeneralPractitioner;
                    $genPractModel->attributes = $phAttributes;
                    $genPractModel->save();

                    $generalPractitionerId = $genPractModel->id;
                } else {
                    $generalPractitionerId = null;
                }
            }

            $attributes['general_practitioner_id'] = $generalPractitionerId;
        }

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Prepare field to be ready for insertion into database
     *
     * @param string $field
     * @return string
     */
    protected function prepareDbField($field)
    {
        $field = preg_replace('/:/', '', $field);

        $field = strtolower($field);

        $field = trim($field);

        $field = preg_replace('/[\s\/]+/', '_', $field);

        return $field;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Translate attributes to be inserted into database
     *
     * @param array Key => value attributes with keys being old field names
     * @return array Attributes with translated key names
     */
    public function translateAttributes($attributes)
    {
        $translatedAttributes = [];

        $vocabulary = self::$oldAttributes;
        foreach ($attributes as $key => $value) {
            if (array_key_exists($key, $vocabulary)) {
                $translatedAttributes[$vocabulary[$key]] = $value;
            } else {
                $translatedAttributes[$key] = $value;
            }
        }

        return $translatedAttributes;
    }

    /**
     * Optimize attributes after scraping
     *
     * @param array $attributes
     * @return array Optimized attributes
     */
    public function optimizeAttributes($attributes)
    {
        $optimizedAttributes = [];
        foreach ($attributes as $key => $value) {
            $keyForMethodName = str_replace('_', ' ', $key);
            $methodName = 'optimize' . str_replace(' ', '', ucwords($keyForMethodName));
            if (method_exists($this, $methodName)) {
                $value = $this->{$methodName}($value);
            }
            $optimizedAttributes[$key] = $value;
        }

        return $optimizedAttributes;
    }

    /**
     * Adapt "general practitioner" before insertion into database
     *
     * @param string $value
     * @return string
     */
    public function optimizeHuisarts($value)
    {
        if (strlen($value) > 120) {
            $value = '';
        }

        $value = preg_replace('#.*\- ([0-9]{3,7})#si', '$1', $value);

        return $value;
    }

    public function optimizeNaam($value)
    {
        return ucwords($value);
    }

    public function optimizeGeslacht($value)
    {
        return substr($value, 0, 1);
    }

    /**
     * Change birth date from external resource to mysql datetime
     * @param string $value
     * @return string|null
     */
    public function optimizeGeboortedatum($value)
    {
        if (preg_match('/(\d{1,2})-(\d{1,2})-(\d{4})/', $value, $matches)) {
            if (intval($matches[2]) < 10) {
                $month = '0' . $matches[2];
            } else {
                $month = $matches[2];
            }

            if (intval($matches[1]) < 10) {
                $day = '0' . $matches[1];
            } else {
                $day = $matches[1];
            }

            $timestamp = strtotime($matches[3] . $month . $day . ' 00:00');
            return strftime('%Y-%m-%d 00:00:00', $timestamp);
        }

        return null;
    }

    /**
     * Transform time of death from format returned by external resource to
     * mysql datetime
     * @param string scraped time
     * @return string|null
     */
    public function optimizeOverledenOp($value)
    {
        if (preg_match('/(\d{2})-(\d{2})-(\d{4})/', $value, $matches)) {
            $timestamp = strtotime($matches[3] . $matches[2] . $matches[1] . ' 00:00');
            return strftime('%Y-%m-%d 00:00:00', $timestamp);
        }

        return null;
    }

    public function optimizeIsOverleden($value)
    {
        $value = strtolower($value);
        return (strcmp($value, 'ja')) ? 0 : 1;
    }

}
