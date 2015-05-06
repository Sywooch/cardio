<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\CardiacCatheterizationReport;
use app\modules\forms\models\search\CardiacCatheterizationReport as CardiacCatheterizationReportSearch;
use app\modules\admin\models\Patient;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * CardiacCatheterizationReportController implements the CRUD actions for CardiacCatheterizationReport model.
 */
class CardiacCatheterizationReportController extends BaseController
{
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
     * Lists all CardiacCatheterizationReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CardiacCatheterizationReportSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel'  => $searchModel,
        ]);
    }

    /**
     * Displays a single CardiacCatheterizationReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $patient = Patient::findOne($model->patient_id);

        return $this->render('view', [
            'model'   => $model,
            'patient' => $patient,
        ]);
    }

    /**
     * Creates a new CardiacCatheterizationReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $patient_id Create report for chosen patient
     * @return mixed
     */
    public function actionCreate($patient_id)
    {
        $model = new CardiacCatheterizationReport;

        $patient = Patient::findOne($patient_id);

        $loadResult = $model->load(Yii::$app->request->post());
        $model->patient_id = $patient_id;
        if ($loadResult && $model->save()) {
            return $this->redirect(['/admin/patient/view', 'id' => $patient_id]);
        } else if ($loadResult) {
            throw new HttpException(500, $this->render('create', [
                'model'   => $model,
                'patient' => $patient,
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
     * Updates an existing CardiacCatheterizationReport model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $patient = Patient::findOne($model->patient_id);
        $loadResult = $model->load(Yii::$app->request->post());

        if ($loadResult && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else if ($loadResult) {
            throw new HttpException(500, $this->render('update', [
                'model'   => $model,
                'patient' => $patient,
            ]));
        } else {
            return $this->render('update', [
                'model'   => $model,
                'patient' => $patient,
            ]);
        }
    }

    /**
     * Deletes an existing CardiacCatheterizationReport model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $patient_id = $model->patient_id;
        $model->delete($id);

        return $this->redirect(['/admin/patient/view', 'id' => $patient_id]);
    }

    /**
     * Finds the CardiacCatheterizationReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CardiacCatheterizationReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CardiacCatheterizationReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
