<?php

namespace tests\unit\components\pdfScrapers;

use Yii;
use yii\codeception\TestCase;
use \expect;

use app\components\pdfScrapers\ECG;

class ECGTest extends TestCase
{
    use \Codeception\Specify;

    protected function prepareControllerForGetScraped($textFile = 'first')
    {
        $pdfText = file_get_contents(Yii::getAlias("@tests/_data/pdfTexts/ecg/$textFile.txt"));
        $scraper = new ECG("@tests/_data/pdfs/xecg/$textFile.pdf");
        $reflection = new \ReflectionObject($scraper);
        $pdfTextProperty = $reflection->getProperty('pdfText');
        $pdfTextProperty->setAccessible(true);
        $pdfTextProperty->setValue($scraper, $pdfText);

        return $scraper;
    }

    public function testScrape()
    {
        $scraper = $this->prepareControllerForGetScraped();
        $data = $scraper->scrape()
            ->getScrapedData();

        $this->specify('should contain scraped data', function () use ($data) {
            expect('should contain birth date and age', $data)
                ->contains('24-DEC-1934 (76 yr)');

            expect('should contain gender', $data)
                ->contains('Male');

            expect('should contain vent rate', $data)
                ->contains('Vent. rate                       68 BPM');
        });
    }
}
