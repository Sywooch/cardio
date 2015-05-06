<?php

namespace app\components\pdfScrapers;

use app\components\AbstractPdfScraper;

class ECG extends AbstractPdfScraper
{
    public function scrape()
    {
        $pdfTextBlocks = explode("\n\r\n", $this->pdfText);
        $pdfTextRows = explode("\n", $pdfTextBlocks[0]);

        $dateRow = array_shift($pdfTextRows);
        $date = trim(substr($dateRow, 79, 30));
        $patCeg = $ecgMeasurements = $ecgReport = '';
        foreach ($pdfTextRows as $row) {
            $patCeg .= "\n" . trim(substr($row, 0, 35));
            $ecgMeasurements .= "\n" . trim(substr($row, 32, 48));
            $ecgReport .= "\n" . trim(substr($row, 84));
        }

        $patCeg = 'Patientgegevens: dd ' . $date . ' ' . $patCeg . "\n";
        $ecgMeasurements = "ECG-metingen: " . $ecgMeasurements . "\n";
        $ecgReport = 'ECG-verslag: dd ' . $date . ' ' . $this->prepareEcgReport($ecgReport) . "\n";

        $this->scrapedData = $patCeg . $ecgMeasurements . $ecgReport;
        return $this;
    }

    protected function prepareEcgReport($report)
    {
        $report = str_replace("*** AGE AND GENDER SPECIFIC ECG ANALYSIS ***", "", $report);
        $report = strtolower($report);
        $report = str_replace("qrs","QRS",$report);
        $report = str_replace("qr","QR",$report);
        $report = str_replace("qt","QT",$report);
        $report = str_replace("ecg","ECG", $report);
        $report = str_replace("rsr","RSR",$report);
        $report = str_replace("normaal ECG",".Normaal ECG",$report);
        $report = str_replace("ab.Normaal ECG",".Abnormaal ECG",$report);
        $report = str_replace("in vergelijking",". In vergelijking",$report);

        return $report;
    }
}

