<?php

namespace app\commands;

use app\modules\admin\models\Patient;
use Yii;
use yii\console\Controller;

/**
 * Read pids from dir and scrape patient from external resource
 */
class PidReaderController extends Controller
{
    public function actionReadAndStore()
    {
        $pids = Yii::$app->pidReader
            ->readPids()
            ->getPids();

        foreach ($pids as $pid) {
            echo "Checking $pid ";
            $exists = Patient::find()
                ->where(['pid' => $pid])
                ->one();

            if ($exists) {
                echo "already present";
            } else {
                echo "parsing ";
                $attributes = Yii::$app->patientScraper
                    ->scrapeAndStorePhysician($pid)
                    ->getAttributes();

                if (!$attributes) {
                    echo 'badly scraped';
                } else {
                    $patient = new Patient;

                    $attributes['pid'] = $pid;
                    $patient->attributes = $attributes;

                    if ($patient->save()) {
                        echo 'scraped and stored';
                    }
                }
            }

            echo PHP_EOL;
        }
    }
}
