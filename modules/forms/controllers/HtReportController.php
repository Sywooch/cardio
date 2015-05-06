<?php

namespace app\modules\forms\controllers;

use app\modules\forms\models\CardiacCatheterizationReport;
use Yii;
use app\modules\forms\models\HtReport;
use app\modules\forms\models\search\HtReport as HtReportSearch;
use yii\db\Expression;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use app\controllers\BaseController;

/**
 * HtReportController implements the CRUD actions for HtReport model.
 */
class HtReportController extends BaseController
{
    public $layout = 'ht-report';

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
     * Lists all HtReport models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HtReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HtReport model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $infarctPrehistories = $model->getHtReportPrehistories()->where(['type' => 'infarct'])->all();
        $pciPrehistories = $model->getHtReportPrehistories()->where(['type' => 'pci'])->all();
        $cabgPrehistories = $model->getHtReportPrehistories()->where(['type' => 'cabg'])->all();
        $addPrehistories = $model->getHtReportPrehistories()->where(['type' => 'additional'])->all();
        $echoPrehistories = $model->getHtReportPrehistories()->where(['type' => 'echo'])->all();
        return $this->render('view', [
            'model'               => $model,
            'infarctPrehistories' => $infarctPrehistories,
            'pciPrehistories'     => $pciPrehistories,
            'cabgPrehistories'    => $cabgPrehistories,
            'addPrehistories'     => $addPrehistories,
            'echoPrehistories'    => $echoPrehistories,
        ]);
    }

    /**
     * Creates a new HtReport model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($patient_id)
    {
        $model = new HtReport();

        $model->patient_id = $patient_id;
        $model->clinical = 1;

        if (!$model->small_description) {
            $message = 'Name: {name}' . PHP_EOL . 'Pid: {pid}' . PHP_EOL . 'Birth date: {birth_date}';
            $model->small_description = Yii::t('modules/forms/app', $message, [
                'name'       => $model->patient->name,
                'pid'        => $model->patient->pid,
                'birth_date' => $model->patient->birth_date,
            ]);
        }

        // Setting discuss date to current date
        $model->discuss_date = strftime('%Y-%m-%d');
        $loadResult = $model->load(Yii::$app->request->post());
        if ($model->ccr_report_id === '0') {
            $model->ccr_report_id = new Expression('null');
        }

        if ($loadResult && $model->save()) {
            return json_encode(['ht_report_id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HtReport model.
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
     * Renders cag section of ht report loading data from cardiac catheterization report into it
     *
     * @param string $ccr_report_id
     */
    public function actionCagSection($ccr_report_id)
    {
        $model = new HtReport();

        if ($ccr_report_id !== '0') {
            $hc = CardiacCatheterizationReport::findOne($ccr_report_id);
            $model->loadFromHc($hc);
        }

        ob_start();
        $form = ActiveForm::begin(['id' => 'ht-report-form']);
        ob_end_clean();

        return $this->renderPartial('_cag', ['model' => $model, 'form' => $form]);
    }

    /**
     * Finds the HtReport model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HtReport the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HtReport::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
