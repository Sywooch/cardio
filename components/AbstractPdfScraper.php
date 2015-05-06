<?php
namespace app\components;

use Yii;

abstract class AbstractPdfScraper
{
    /**
     * @var string Path to pdf file
     */
    protected $pdfFilePath;

    /**
     * @var string scraped data
     */
    protected $scrapedData;

    /**
     * @var string converted pdf text
     */
    protected $pdfText;

    abstract public function scrape();

    /**
     * Initializes path to pdf and runs converter to text
     *
     * @param string $pdfFilePath Path to pdf file
     */
    public function __construct($pdfFilePath)
    {
        $this->pdfFilePath = Yii::getAlias($pdfFilePath);
        $this->convertPdfToTxt();
    }

    protected function convertPdfToTxt()
    {
        $content = shell_exec('pdftotext ' . $this->pdfFilePath . ' -');

        $this->pdfText = $content;
    }

    /**
     * Returns data after running scrape method
     *
     * @return string
     */
    public function getScrapedData()
    {
        return $this->scrapedData;
    }

    /**
     * Return text of pdf after running pdf converter
     *
     * @return string
     */
    public function getPdfText()
    {
        return $this->pdfText;
    }

}

