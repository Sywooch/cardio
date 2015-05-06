<?php

namespace tests\unit\components\pdfScrapers;

use Yii;
use yii\codeception\TestCase;
use \expect;

use app\components\pdfScrapers\XECG;

class XECGTest extends TestCase
{
    use \Codeception\Specify;

    protected function prepareControllerForGetScraped($textFile = 'first')
    {
        $pdfText = file_get_contents(Yii::getAlias("@tests/_data/pdfTexts/xecg/$textFile.txt"));
        $scraper = new XECG("@tests/_data/pdfs/xecg/$textFile.pdf");
        $reflection = new \ReflectionObject($scraper);
        $pdfTextProperty = $reflection->getProperty('pdfText');
        $pdfTextProperty->setAccessible(true);
        $pdfTextProperty->setValue($scraper, $pdfText);

        return $scraper;
    }

    public function testGetPdfText()
    {
        $scraper = new XECG('@tests/_data/pdfs/xecg/first.pdf');

        $this->specify('should return parsed data from pdf', function() use ($scraper) {
            $data = $scraper->getPdfText();
            expect('should contain one of the lines from pdf', substr($data, 0, 200))->contains('FINAL EXERCISE STRESS REPORT');
        });
    }

    public function testScrapeFirstStrategy()
    {
        $scraper = $this->prepareControllerForGetScraped();
        $data = $scraper->scrape()
            ->getScrapedData();

        $this->specify('should return scraped data', function() use ($scraper, $data) {
            expect('should contain reason for termination string from pdf', substr($data, 0, 200))
                ->contains('Reden tot stoppen: Ritmestoornissen');

            expect('should contain age in string from pdf', substr($data, 0, 200))
                ->contains('Leeftijd 58');

            expect('should contain tabular report summary scraped', substr($data, 0, 200))
                ->contains('Leeftijd 58 jr. Lengte 182 cm. Gewicht 73 kg. Sexe Man. Ras Caucasisch.');

            $compareString = "Ergometrisch onderzoek:\n" .
                "Patient behaalt na 150.0 Watt" .
                ' en in het totaal 6:10' .
                ' min een maximale hartfrequentie van 162' .
                " slagen per minuut (dit is 100 % van de voor de leeftijd voorspelde maximale waarde." .
                " De maximale bloeddruk bedraagt hierbij 181/94 mm Hg." .
                " Reden tot stoppen: Ritmestoornissen.";

            expect('should contain summary report data', substr($data, 0, 500))
                ->contains($compareString);
        });
    }

    public function testScrapeSecondStrategy()
    {
        $scraper = $this->prepareControllerForGetScraped('second');

        $data = $scraper->scrape()
            ->getScrapedData();

        $this->specify('should return scraped data', function() use ($data) {
            expect('should contain reden von beeindiging', $data)
                ->contains('Reden voor beëindiging: Vermoeidheid');

            expect('should contain samevatting', $data)
                ->contains('Samenvatting: Pijn op de borst: geen');
        });
    }

}
