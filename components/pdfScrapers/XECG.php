<?php

namespace app\components\pdfScrapers;

use app\components\AbstractPdfScraper;

use Yii;

class XECG extends AbstractPdfScraper
{

    /**
     * Scrapes pdf data - chooses between two strategies
     *
     * @return $this
     */
    public function scrape()
    {
        if (preg_match('/Conclusie/', $this->pdfText)) {
            $this->scrapeSecondStrategy();
        } else {
            $this->scrapeFirstStrategy();
        }

        return $this;
    }

    /**
     * Second algorithm to scrape xecg pdf data
     * @return $this
     */
    public function scrapeSecondStrategy()
    {
        $this->pdfText = iconv('windows-1252', 'UTF-8', $this->pdfText);
        if (preg_match('/Ergo1\s+(Totaal.+)Conclusie:/s', $this->pdfText, $matches)) {
            $scrapedData = $matches[1];
            $scrapedData = preg_replace("/\n/", '', $scrapedData);
            $scrapedData = preg_replace('/\s+/', ' ', $scrapedData);
            $this->scrapedData = $scrapedData;
        } else {
            $this->scrapedData = '';
        }
        return $this;
    }

    /**
     * First Algorithm to scrape pdf data
     * @return $this
     */
    public function scrapeFirstStrategy()
    {
        $pdfTextRows = explode("\n\r\n", $this->pdfText);

        for ($i = 0; $i < count($pdfTextRows); $i++) {

            if (strpos($pdfTextRows[$i], "nterpretation")) {

                $commentXECG = '';

                $hrRespKey = 'HR Response To Stress';
                $htRespValue = trim(explode("$hrRespKey:", $pdfTextRows[$i])[1]);
                if ($htRespValue) {
                    $commentXECG .= Yii::t('xecg', $hrRespKey) . ': ' . $htRespValue . '. ';
                }

                $bpRespKey = 'BP Response To Stress';
                $bpRespValue = trim(explode("$bpRespKey:", $pdfTextRows[$i + 1])[1]);
                if ($bpRespValue) {
                    $commentXECG .= Yii::t('xecg', $bpRespKey) . ': ' . $bpRespValue . '. ';
                }

                $rsRespKey = 'Arrhythmia(s)';
                $rsRespValue = trim(explode("$rsRespKey:", $pdfTextRows[$i + 3])[1]);
                if ($rsRespValue) {
                    $commentXECG .= Yii::t('xecg', $rsRespKey) . ': ' . $rsRespValue . '. ';
                }

                $terminationReasonKey = 'Reason For Termination';
                $terminationReasonValue = trim(explode("$terminationReasonKey:", $pdfTextRows[$i + 4])[1]);
                if ($terminationReasonValue) {
                    $terminationReason = Yii::t('xecg', $terminationReasonKey) . ': ' . $terminationReasonValue . '. ';
                    $commentXECG .= $terminationReason;
                }

                $funcCapacityKey = 'Functional Capacity';
                $funcCapacityValue = trim(explode("$funcCapacityKey:", $pdfTextRows[$i + 5])[1]);
                if ($funcCapacityValue) {
                    $commentXECG .= Yii::t('xecg', $funcCapacityKey) . ': ' . $funcCapacityValue . '. ';
                }

                $chestPainKey = 'Chest Pain';
                $chestPainValue = trim(explode("$chestPainKey:", $pdfTextRows[$i + 6])[1]);
                if ($chestPainValue) {
                    $commentXECG .= Yii::t('xecg', $chestPainKey) . ': ' . $chestPainValue . '. ';
                }

                $overallKey = 'Overall Impressions';
                $overallValue = trim(explode("$overallKey:", $pdfTextRows[$i + 7])[1]);
                if ($overallValue) {
                    $commentXECG .= Yii::t('xecg', $overallKey) . ': ' . $overallValue . '. ';
                }

                $interpretationKey = 'INTERPRETATION';
                $interpretationValue = trim($pdfTextRows[$i + 9]);
                if ($interpretationValue) {
                    $commentXECG .= Yii::t('xecg', $interpretationKey) . ': ' . $interpretationValue;
                }

                $commentXECG = Yii::t('xecg', 'Technician comments at XECG: ') . $commentXECG;
            }

            // Analysis of pt characteristics
            if (strpos($pdfTextRows[$i], "TABULAR SUMMARY REPORT") !== false) {

                $pdfTextRows[$i] = str_replace("Male", Yii::t('xecg', 'Male'), $pdfTextRows[$i]);
                $pdfTextRows[$i] = str_replace("Caucasian", Yii::t('xecg', 'Caucasian'), $pdfTextRows[$i]);

                $ageKey = 'Age';
                if (preg_match("/$ageKey:\s*(\d+)/", $pdfTextRows[$i], $matches)) {
                    $age = $matches[1];
                } else {
                    $age = 0;
                }

                $htKey = 'Ht';
                if (preg_match("/$htKey:\s*(\d+)/", $pdfTextRows[$i], $matches)) {
                    $ht = $matches[1];
                } else {
                    $ht = 0;
                }

                $wtKey = 'Wt';
                if (preg_match("/$wtKey:\s*(\d+)/", $pdfTextRows[$i], $matches)) {
                    $wt = $matches[1];
                } else {
                    $wt = 0;
                }

                $sexKey = 'Sex';
                $sex = substr($pdfTextRows[$i], strpos($pdfTextRows[$i], "$sexKey:") + 5, 3);

                $raceKey = "Race";
                if (preg_match("/$raceKey:\s*(\w+)/", $pdfTextRows[$i], $matches)) {
                    $race = $matches[1];
                } else {
                    $race = '';
                }

                $rfx = Yii::t('xecg', $ageKey) . ' ' . $age . ' jr. ';
                $rfx .= Yii::t('xecg', 'Height') . ' ' . $ht . ' cm. ';
                $rfx .= Yii::t('xecg', 'Weight') . ' ' . $wt . ' kg. ';
                $rfx .= Yii::t('xecg', $sexKey) . ' ' . $sex . '. ';
                $rfx .= Yii::t('xecg', $raceKey) . ' ' . $race . '.';

                $rfx = Yii::t('xecg', 'Risk factors for machine') . ': ' . $rfx;

                // Analysis of test results, summary report
                $i++;
                $maximumWorkloadKey = 'Maximum Workload Attained';
                if (preg_match('/' . $maximumWorkloadKey . ':\s*([\d\.]+)/', $pdfTextRows[$i], $matches)) {
                    $workload = $matches[1];
                } else {
                    $workload = '';
                }

                $totalExerciseTimeKey = "Total Exercise Time";
                if (preg_match('/' . $totalExerciseTimeKey . ':\s*([\d:]+)/', $pdfTextRows[$i], $matches)) {
                    $totalExerciseTime = $matches[1];
                } else {
                    $totalExerciseTime = '';
                }

                $maximumHeartFrequencyKey = "Maximum Heart Rate Attained";
                if (preg_match('/' . $maximumHeartFrequencyKey . ':\s*(\d+)spm\s+(\d+)/', $pdfTextRows[$i], $matches)) {
                    $maximumHeartFrequency = $matches[1];
                    $heartFrequencyPercent = $matches[2];
                } else {
                    $maximumHeartFrequency = '';
                    $heartFrequencyPercent = '';
                }

                $maximumBPKey = 'Maximum BP';
                if (preg_match('/' . $maximumBPKey . ':\s*([\d\/]+)/', $pdfTextRows[$i], $matches)) {
                    $maximumBP = $matches[1];
                } else {
                    $maximumBP = '';
                }

                $resultXECG = "Ergometrisch onderzoek:\n" .
                    Yii::t('xecg', $maximumWorkloadKey) . " $workload Watt" .
                    ' ' . Yii::t('xecg', $totalExerciseTimeKey) . " $totalExerciseTime min" .
                    ' ' . Yii::t('xecg', $maximumHeartFrequencyKey) . " $maximumHeartFrequency" .
                    " slagen per minuut (dit is $heartFrequencyPercent % van de voor de leeftijd voorspelde maximale waarde." .
                    " De maximale bloeddruk bedraagt hierbij $maximumBP mm Hg." .
                    " $terminationReason.";
            }

            if (preg_match('/BASELINE\s+PEAK/', $pdfTextRows[$i])) {
                $STslopeIndex = $i + 1;
                break;
            }
        }

        /**
         * Analysis of data ST depressions and slope
         * - ST elevation and slope
         */
        $ST2m1_EL_XECG = array();
        $ST2m1_V_XECG = array();
        $ST3m1_EL_XECG = array();
        $ST3m1_V_XECG = array();
        $slope_EL_XECG = array();
        $slope_V_XECG = array();
        $MaxBLRepolXECG = 0;
        $MaxPRepolXECG = 0;


        for ($i = 1; $i < 7; $i++) {
            $pdfTextRows[$STslopeIndex + $i] = preg_replace('/mm|I|II|III|aVR|aVL|aVF|V1|V2|V3|V4|V5|V6|\n|\r/', "", $pdfTextRows[$STslopeIndex + $i]);
            $pdfTextRows[$STslopeIndex + $i] = str_replace("mV" . chr(47) . "s", "", $pdfTextRows[$STslopeIndex + $i]);

            $pdfTextRows[$STslopeIndex + $i] = str_replace("    ", " ", $pdfTextRows[$STslopeIndex + $i]);
            $pdfTextRows[$STslopeIndex + $i] = str_replace("   ", " ", $pdfTextRows[$STslopeIndex + $i]);
            $pdfTextRows[$STslopeIndex + $i] = str_replace("  ", " ", $pdfTextRows[$STslopeIndex + $i]);
            $pdfTextRows[$STslopeIndex + $i] = str_replace("  ", " ", $pdfTextRows[$STslopeIndex + $i]);
            $pdfTextRows[$STslopeIndex + $i] = trim($pdfTextRows[$STslopeIndex + $i]);
            $CASEpos = strpos($pdfTextRows[$STslopeIndex + $i], "CASE");
            if ($CASEpos) {
                $pdfTextRows[$STslopeIndex + $i] = substr($pdfTextRows[$STslopeIndex + $i], 0, $CASEpos - 5);
            }

            $hulpexp = explode(" ", $pdfTextRows[$STslopeIndex + $i]);

            $MaxSTpos = strpos($pdfTextRows[$STslopeIndex - 1], "MAX ST");
            if ($MaxSTpos) {
                $ST3m1_EL_XECG[$i]['BL'] = $hulpexp[0]; //point 1, on PR interval baseline
                $ST3m1_EL_XECG[$i]['P'] = $hulpexp[1]; // point 2 J point
                $ST3m1_EL_XECG[$i]['MaxST'] = $hulpexp[2]; //point 3 80 msec after J-point
                $ST3m1_EL_XECG[$i]['ERec'] = $hulpexp[3]; //ST difference between point 3 and point 1
                $ST3m1_V_XECG[$i]['BL'] = $hulpexp[4];
                $ST3m1_V_XECG[$i]['P'] = $hulpexp[5]; //BL = Baseline
                $ST3m1_V_XECG[$i]['MaxST'] = $hulpexp[6]; // Peak
                $ST3m1_V_XECG[$i]['ERec'] = $hulpexp[7]; // at Maximum ST difference
                $slope_EL_XECG[$i]['BL'] = $hulpexp[8]; // at test end, end of recording
                $slope_EL_XECG[$i]['P'] = $hulpexp[9]; //slope from point 2 to 3
                $slope_EL_XECG[$i]['MaxST'] = $hulpexp[10];
                $slope_EL_XECG[$i]['ERec'] = $hulpexp[11];
                $slope_V_XECG[$i]['BL'] = $hulpexp[12]; //if ST-depression is not present, there is no Max ST calculated
                $slope_V_XECG[$i]['P'] = $hulpexp[13];
                $slope_V_XECG[$i]['MaxST'] = $hulpexp[14]; //EL extremity leads
                $slope_V_XECG[$i]['ERec'] = $hulpexp[15]; // V praecordial leads
            } else {

                $ST3m1_EL_XECG[$i]['BL'] = $hulpexp[0];
                $ST3m1_EL_XECG[$i]['P'] = $hulpexp[1];
                $ST3m1_EL_XECG[$i]['ERec'] = $hulpexp[2];
                $ST3m1_V_XECG[$i]['BL'] = $hulpexp[3];
                $ST3m1_V_XECG[$i]['P'] = $hulpexp[4];
                $ST3m1_V_XECG[$i]['ERec'] = $hulpexp[5];
                $slope_EL_XECG[$i]['BL'] = $hulpexp[6];
                $slope_EL_XECG[$i]['P'] = $hulpexp[7];
                $slope_EL_XECG[$i]['ERec'] = $hulpexp[8];
                $slope_V_XECG[$i]['BL'] = $hulpexp[9];
                $slope_V_XECG[$i]['P'] = $hulpexp[10];
                $slope_V_XECG[$i]['ERec'] = $hulpexp[11];
            }
            if (abs($slope_EL_XECG[$i]['BL']) <= 0.2) {
                $slope_EL_XECG[$i]['BL'] = 0;
            }
            $ST2m1_EL_XECG[$i]['BL'] = $ST3m1_EL_XECG[$i]['BL'] - 20 / 25 * $slope_EL_XECG[$i]['BL'];
            if (abs($slope_EL_XECG[$i]['P']) <= 0.2) {
                $slope_EL_XECG[$i]['P'] = 0;
            }
            $ST2m1_EL_XECG[$i]['P'] = $ST3m1_EL_XECG[$i]['P'] - 20 / 25 * $slope_EL_XECG[$i]['P'];
            $ST2m1_EL_XECG[$i]['MaxST'] = $ST3m1_EL_XECG[$i]['MaxST'] - 20 / 25 * $slope_EL_XECG[$i]['MaxST'];
            $ST2m1_EL_XECG[$i]['ERec'] = $ST3m1_EL_XECG[$i]['ERec'] - 20 / 25 * $slope_EL_XECG[$i]['ERec'];
            if (abs($slope_V_XECG[$i]['BL']) <= 0.2) {
                $slope_V_XECG[$i]['BL'] = 0;
            }
            $ST2m1_V_XECG[$i]['BL'] = $ST3m1_V_XECG[$i]['BL'] - 20 / 25 * $slope_V_XECG[$i]['BL'];
            if (abs($slope_V_XECG[$i]['P']) <= 0.2) {
                $slope_V_XECG[$i]['P'] = 0;
            };
            $ST2m1_V_XECG[$i]['P'] = $ST3m1_V_XECG[$i]['P'] - 20 / 25 * $slope_V_XECG[$i]['P'];
            $ST2m1_V_XECG[$i]['MaxST'] = $ST3m1_V_XECG[$i]['MaxST'] - 20 / 25 * $slope_V_XECG[$i]['MaxST'];
            $ST2m1_V_XECG[$i]['ERec'] = $ST3m1_V_XECG[$i]['ERec'] - 20 / 25 * $slope_V_XECG[$i]['ERec'];

            if ($ST2m1_EL_XECG[$i]['BL'] < $MaxBLRepolXECG) { //determine max ST-depress, at BLline
                $MaxBLRepolXECG = $ST2m1_EL_XECG[$i]['BL'];
                $LeadMaxBLRepolXECG = "EL";
                $IndexMaxBLRepolXECG = $i;
            } else if ($ST2m1_V_XECG[$i]['BL'] < $MaxBLRepolXECG) {
                $MaxBLRepolXECG = $ST2m1_V_XECG[$i]['BL'];
                $LeadMaxBLRepolXECG = "V";
                $IndexMaxBLRepolXECG = $i;
            }

            if ($ST2m1_EL_XECG[$i]['P'] < $MaxPRepolXECG) { //determine max ST-depress, at peak
                $MaxPRepolXECG = $ST2m1_EL_XECG[$i]['P'];
                $LeadMaxPRepolXECG = "EL";
                $IndexMaxPRepolXECG = $i;
            } else if ($ST2m1_V_XECG[$i]['P'] < $MaxPRepolXECG) {
                $MaxPRepolXECG = $ST2m1_V_XECG[$i]['P'];
                $LeadMaxPRepolXECG = "V";
                $IndexMaxPRepolXECG = $i;
            }
        }

        /**
         * Interpretation of Data by criteria of Nieuwegein
         */
        if ($MaxBLRepolXECG >= -0.2) {
            if ($MaxPRepolXECG >= -0.2) {                          //ST at rest normal
                $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning niet. De test wordt geclassificeerd als negatief.";
            } else if ($MaxPRepolXECG <= -1.8) {
                if ($LeadMaxPRepolXECG == "EL") {
                    if ($ST3m1_EL_XECG[$IndexMaxPRepolXECG]['P'] <= -1.8) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning significant. De test wordt geclassificeerd als positief.";
                    } else if ($ST3m1_EL_XECG[$IndexMaxPRepolXECG]['P'] >= -1.8) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning niet significant. De test wordt geclassificeerd als binnen normale grenzen.";
                    }
                } else if ($LeadMaxPRepolXECG == "V") {
                    if ($ST3m1_V_XECG[$IndexMaxPRepolXECG]['P'] <= -1.8) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning significant. De test wordt geclassificeerd als positief.";
                    } else if ($ST3m1_V_XECG[$IndexMaxPRepolXECG]['P'] >= -1.8) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning niet significant. De test wordt geclassificeerd als binnen normale grenzen.";
                    }
                }
            } else if (($MaxPRepolXECG >= -1.8) && ($MaxPRepolXECG < -1.0)) {
                if ($LeadMaxPRepolXECG == "EL") {
                    if (abs($ST3m1_EL_XECG[$IndexMaxPRepolXECG]['P'] - $MaxPRepolXECG) <= 0.2) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning significant. De test wordt geclassificeerd als positief.";
                    } else if ($ST3m1_EL_XECG[$IndexMaxPRepolXECG]['P'] >= $MaxPRepolXECG) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning niet significant. De test wordt geclassificeerd als binnen normale grenzen.";
                    }
                } else if ($LeadMaxPRepolXECG == "V") {
                    if (abs($ST3m1_V_XECG[$IndexMaxPRepolXECG]['P'] - $MaxPRepolXECG) <= 0.2) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning significant. De test wordt geclassificeerd als positief.";
                    } else if ($ST3m1_V_XECG[$IndexMaxPRepolXECG]['P'] >= $MaxPRepolXECG) {
                        $ConclXECG = "De in rust bij deze afleidingen ongestoorde repolarisatie wijzigt zich bij maximale inspanning niet significant. De test wordt geclassificeerd als binnen normale grenzen.";
                    }
                }
            }
        } else if ($MaxBLRepolXECG <= -0.2) {
            if (abs($MaxPRepolXECG - $MaxBLRepolXECG) <= 0.2) {
                $ConclXECG = "De in rust bij deze afleidingen gestoorde repolarisatie wijzigt zich bij maximale inspanning niet. De test wordt geclassificeerd als waarschijnlijk negatief.";
            } else if (abs($MaxPRepolXECG - $MaxBLRepolXECG) >= 1.8) {
                $ConclXECG = "De in rust bij deze afleidingen gestoorde repolarisatie wijzigt zich bij maximale inspanning significant. De test wordt geclassificeerd als waarschijnlijk positief.";
            } else if ((abs($MaxPRepolXECG - $MaxBLRepolXECG) <= 1.8) && (abs($MaxPRepolXECG - $MaxBLRepolXECG) > 0.2)) {
                $ConclXECG = "De in rust bij deze afleidingen gestoorde repolarisatie wijzigt zich bij maximale inspanning niet significant. De test wordt geclassificeerd als waarschijnlijk binnen normale grenzen.";
            }
        }

        if ($heartFrequencyPercent <= 80) {
            $ConclXECG = $ConclXECG . " In strikte zin is ischemie niet goed te beoordelen wegens onvoldoende behaalde maximale hartfrequentie.\n";
        }

        $xecgReport = $commentXECG . $rfx . $resultXECG . $ConclXECG;

        $this->scrapedData = $xecgReport;

        return $this;
    }
}

