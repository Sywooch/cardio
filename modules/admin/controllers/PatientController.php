<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Patient;
use app\modules\admin\models\search\Patient as PatientSearch;
use app\modules\forms\models\search\CardiacCatheterizationReport as CardiacCatheterizationReportSearch;
use app\modules\forms\models\search\PciReport as PciReportSearch;
use app\modules\forms\models\search\HtReport as HtReportSearch;
use app\modules\forms\models\search\PatientPrehistory as PatientPrehistorySearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends BaseController
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
     * Lists all Patient models.
     * @throws \yii\web\NotFoundHttpException
     * @return mixed
     */
    public function actionIndex()
    {
        $queryParams = Yii::$app->request->getQueryParams();

        $oldPatientId = Yii::$app->request->post('pid', 0);

        if ($oldPatientId) {
            // When user entered patient number in the find form
            $patient = Patient::find()
                ->where(['pid' => $oldPatientId])
                ->one();

            if (!$patient) {
                // When no patient found in local database
                $attributes = Yii::$app->patientScraper
                    ->scrapeAndStorePhysician($oldPatientId)
                    ->getAttributes();

                if ($attributes) {
                    // Saving patient
                    $model = new Patient;
                    $model->attributes = $attributes;

                    $model->save();

                    $patientId = $model->id;
                } else {
                    // In case when nothing returned from external resource
                    throw new NotFoundHttpException('No patient data found for specified id');
                }
            } else {
                $patientId = $patient->id;
            }

            return $this->redirect(['view', 'id' => $patientId]);

        } else {
            $searchModel = new PatientSearch;
            $dataProvider = $searchModel->search($queryParams);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel'  => $searchModel,
            ]);
        }
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        // CCR Data provider
        $searchModel = new CardiacCatheterizationReportSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        $dataProvider->query->andWhere(['patient_id' => $id]);
        $dataProvider->query->orderBy('created_at desc');

        $model = $this->findModel($id);

        // PCI Report Data provider
        $pciSearchModel = new PciReportSearch;
        $pciDataProvider = $pciSearchModel->search(Yii::$app->request->getQueryParams());

        $pciDataProvider->query->andWhere(['patient_id' => $id]);
        $pciDataProvider->query->orderBy('created_at desc');

        // Ht Report Data provider
        $htReportSearchModel = new HtReportSearch;
        $htDataProvider = $htReportSearchModel->search(Yii::$app->request->getQueryParams());

        $htDataProvider->query->andWhere(['patient_id' => $id]);
        $htDataProvider->query->orderBy('created_at desc');

        // Patient prehistory Data provider
        $patientPrehistorySearchModel = new PatientPrehistorySearch;
        $patientPrehistoryDataProvider = $patientPrehistorySearchModel->search(Yii::$app->request->getQueryParams());

        $patientPrehistoryDataProvider->query->andWhere(['patient_id' => $id]);
        $patientPrehistoryDataProvider->query->orderBy('date desc');

        return $this->render('view', [
            'model'                         => $model,
            'reportDataProvider'            => $dataProvider,
            'pciDataProvider'               => $pciDataProvider,
            'htDataProvider'                => $htDataProvider,
            'patientPrehistoryDataProvider' => $patientPrehistoryDataProvider,
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
