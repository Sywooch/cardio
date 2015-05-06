<?php

namespace app\modules\forms\controllers;

use app\modules\forms\models\PrehistoryItem;
use Yii;
use app\modules\forms\models\PatientPrehistory;
use app\modules\admin\models\Patient;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * PatientPrehistoryController implements CRUD for PatientPrehistory model
 */
class PatientPrehistoryController extends Controller
{
    public $layout = 'patient-prehistory';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new PatientPrehistory model.
     * If creation is successful, the browser will be redirected to patient
     * view page
     *
     * @param int $patient_id Create report for chosen patient
     * @return mixed
     */
    public function actionCreate($patient_id)
    {
        $model = new PatientPrehistory();

        $patient = Patient::findOne($patient_id);

        $loadResult = $model->load(Yii::$app->request->post());
        $model->patient_id = $patient_id;
        if ($loadResult && $model->save()) {
            return $this->redirect(['/admin/patient/view', 'id' => $patient_id]);
        } else {
            $prehistoryItems = PrehistoryItem::find()->all();
            foreach ($prehistoryItems as $pItem) {
                $prehistoryItemsArray[$pItem->id] = $pItem->name;
            }

            return $this->render('create', [
                'model' => $model,
                'patient' => $patient,
                'prehistoryItemsArray' => $prehistoryItemsArray,
            ]);
        }
    }

    /**
     * Updates PatientPrehistory model.
     *
     * @param int $id PatientPrehistory model id
     * @return string Redered form
     */
    public function actionUpdate($id)
    {
        $model = PatientPrehistory::findOne($id);

        $patient = $model->getPatient()->one();
        $loadResult = $model->load(Yii::$app->request->post());
        if ($loadResult && $model->save()) {
            return $this->redirect(['/admin/patient/view', 'id' => $patient->id]);
        } else {
            $prehistoryItems = PrehistoryItem::find()->all();
            foreach ($prehistoryItems as $pItem) {
                $prehistoryItemsArray[$pItem->id] = $pItem->name;
            }

            return $this->render('update', [
                'model' => $model,
                'patient' => $patient,
                'prehistoryItemsArray' => $prehistoryItemsArray,
            ]);
        }
    }

    /**
     * Deletes an existing PatientPrehistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $patient = $this->findModel($id);

        $patient->delete();

        return $this->redirect(['/admin/patient/view', 'id' => $patient->id]);
    }

    /**
     * Finds the PatientPrehistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PatientPrehistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PatientPrehistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
