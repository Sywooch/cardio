<?php

namespace app\commands;

use app\components\pdfScrapers\ECG;
use app\components\pdfScrapers\XECG;
use app\models\Report;
use Yii;

/**
 * Get list of doctors and iterate over appointments for patient ids
 */
class MedviewController extends \yii\console\Controller
{
    /**
     * Connect to Medview get pids and collect Ecgs and Xecgs
     */
    public function actionIndex()
    {
        $medview = Yii::createObject(Yii::$app->params['medview']);
        $pids = $medview->getPatientIds();

        // Getting Ecg's
        $clinicalAssistant = Yii::createObject(Yii::$app->params['clinicalAssistant']);
        foreach ($pids as $pid) {
            $clinicalAssistant->setPid($pid);
            $ecgPdfs = $clinicalAssistant->collectEcgFiles();
            foreach ($ecgPdfs as $pdf) {
                $scraper = new ECG($pdf);
                $scrapedData = $scraper->scrape()
                    ->getScrapedData();

                $report = new Report();
                $report->report = $scrapedData;
                $report->patient_id = $pid;
                $report->type = 'ecg';
                $report->save();
            }

            $xecgPdfs = $clinicalAssistant->collectXEcgFiles();
            foreach ($xecgPdfs as $pdf) {
                $scraper = new XECG($pdf);
                $scrapedData = $scraper->scrape()
                    ->getScrapedData();

                $report = new Report();
                $report->report = $scrapedData;
                $report->patient_id = $pid;
                $report->type = 'xecg';
                $report->save();
            }
        }
    }

    public function actionTemp()
    {
        $drArray = Yii::$app->params['drArray'];

        $pids = [];
        foreach ($drArray as $doctor) {
            $appointments = Yii::$app->medview->get_appointments($doctor, 'array');
            foreach ($appointments as $appointment) {
                $pids[] = $appointment['pid'];
            }
        }

        $pids = array_unique($pids);

        $centricyEcho = Yii::$app->centricyEcho;
        $clinicalAssistant = Yii::$app->clinicalAssistant;
        $brievenMap = Yii::$app->params['brievenMap'];
        foreach ($pids as $pid) {
            $clinicalAssistant->pidInit($pid);
            $clinicalAssistant->getAllEcgs();
            $clinicalAssistant->getAllXecgs();

            $centricyEcho->pidInit($pid);
            foreach ($centricyEcho->getItemsLinks() as $date => $itemLink) {
		        $lastReport = $centricyEcho->getLastReport($centricyEcho->getReports($itemLink));
		        $sixdate = date('dmy', $date);

		        $echoDir = $brievenMap.$pid."\\echo";

                if (!is_dir($echoDir)) {
                    mkdir($echoDir);
                }

		        //clog("save echo $echoDir/$sixdate/.pdf ($lastReport)");
		        $centricyEcho->saveReportAsPdf($lastReport, $echoDir."\\".$sixdate.".pdf");
            }
        }
    }
}
