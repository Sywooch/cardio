<?php

namespace app\modules\api\controllers;

use app\modules\admin\models\Patient;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;

class PatientController extends ActiveController
{
    public $modelClass = 'app\modules\admin\models\Patient';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
        ];

        return $behaviors;
    }

    public function actionByPid($pid)
    {
        $model = Patient::find()
            ->where(['pid' => $pid])
            ->one();

        if (!$model) {
            // Scraping patient from medview
            $attributes = Yii::$app->patientScraper
                ->scrapeAndStorePhysician($pid)
                ->getAttributes();

            if ($attributes) {
                // Saving patient
                $model = new Patient;
                $model->attributes = $attributes;

                $model->save();
            } else {
                throw new NotFoundHttpException();
            }

        }

        return $model;
    }
}

