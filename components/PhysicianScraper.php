<?php

namespace app\components;

use Yii;

class PhysicianScraper
{
    /**
     * @var string contains {patientId}, which should be replaced by proper id.
     * From resulting url physician will be scraped
     */
    public $urlTemplate;

    /**
     * @var array Scraped attributes to be inserted into database
     */
    protected $attributes;

    /**
     * Scrape physician from http using patient code
     *
     * @param string $pid
     * @param string $physicianCode
     */
    public function scrape($pid, $physicianCode)
    {
        $url = str_replace('{pid}', $pid, $this->urlTemplate);
        $url = Yii::getAlias($url);

        $content = file_get_contents($url);
        $content = trim($content);
        if (empty($content)) {
            // No such physician found
            $this->attributes = [];
            return $this;
        }

        $content = preg_replace('/<br>/i', "\n",  $content);
        $content = preg_split('/<hr style="LEFT: 0px; TOP: 8px">/i', $content);
        if (count($content) === 1) {
            $this->attributes = [];
            return $this;
        }

        $contentStrip = strip_tags($content[2]);
        $contentStripSplit = explode("\n", $contentStrip);

        $attributes = [];
        $attributes["name"] = trim($contentStripSplit[14]);
        $attributes["address"] = $contentStripSplit[16];
        $attributes["zip_code"] = $contentStripSplit[17];
        $attributes["city"] = $contentStripSplit[19];

        $attributes['code'] = $physicianCode;

        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Return scraped attributes
     *
     * @return array Scraped Attributes
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
