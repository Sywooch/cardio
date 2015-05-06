<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\PciReport;
use app\modules\forms\models\Artery;
use app\modules\admin\models\Patient;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * PciReportController implements CRUD for PciReport model
 */
class PciReportController extends BaseController
{
    public $layout = 'pci-report';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Creates a new PciReport model.
     * If creation is successful, the browser will be redirected to patient
     * view page
     *
     * @param int $patient_id Create report for chosen patient
     * @return mixed
     */
    public function actionCreate($patient_id)
    {
        $model = new PciReport;

        $patient = Patient::findOne($patient_id);

        $loadResult = $model->load(Yii::$app->request->post());
        $model->patient_id = $patient_id;
        if ($loadResult && $model->save()) {
            $data = [
                'pci_report_id' => $model->id,
            ];
            return json_encode($data);
        } else if ($loadResult) {
            throw new HttpException(500, $this->renderPartial('_main-subform', [
                'model'   => $model,
                'patient' => $patient,
                'isView'  => false,
            ]));
        } else {
            // Setting movie date to current date
            $model->movie_date = strftime('%Y-%m-%d');

            // Setting default value for clinical
            $model->clinical = 1;

            if (!$model->small_description) {
                $message = 'Name: {name}' . PHP_EOL . 'Pid: {pid}' . PHP_EOL . 'Birth date: {birth_date}';
                $model->small_description = Yii::t('modules/forms/app', $message, [
                    'name'       => $model->patient->name,
                    'pid'        => $model->patient->pid,
                    'birth_date' => $model->patient->birth_date,
                ]);
            }

            return $this->render('create', [
                'model'   => $model,
                'patient' => $patient,
            ]);
        }
    }

    /**
     * Updates PciReport model.
     *
     * @param int $id PciReport model id
     * @return string Redered form
     */
    public function actionUpdate($id)
    {
        $model = PciReport::findOne($id);

        $patient = $model->getPatient()->one();
        $loadResult = $model->load(Yii::$app->request->post());
        if ($loadResult && $model->save()) {
            $data = [
                'pci_report_id' => $model->id,
            ];
            return json_encode($data);
        } else if ($loadResult) {
            throw new HttpException(500, $this->render('_main-subform', [
                'model'   => $model,
                'patient' => $patient,
                'isView'  => false,
            ]));
        } else {
            return $this->render('update', [
                'model'   => $model,
                'patient' => $patient,
            ]);
        }
    }

    /**
     * Displays a single PciReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $patient = $model->getPatient()->one();

        return $this->render('view', [
            'model'   => $model,
            'patient' => $patient,
        ]);
    }

    /**
     * Finds the PciReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PciReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PciReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
