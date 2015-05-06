<?php

namespace app\modules\forms\controllers;

use Yii;
use app\modules\forms\models\HtReportPrehistory;
use app\modules\forms\models\search\HtReportPrehistory as HtReportPrehistorySearch;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * HtReportPrehistoryController implements the CRUD actions for HtReportPrehistory model.
 */
class HtReportPrehistoryController extends BaseController
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
     * Creates a new HtReportPrehistory model.
     * @return mixed
     */
    public function actionCreate($type, $ht_report_id = null)
    {
        $model = new HtReportPrehistory();

        $loadResult = $model->load(Yii::$app->request->post());
        $model->type = $type;
        if ($ht_report_id) {
            $model->ht_report_id = $ht_report_id;
        }
        if ($loadResult && $model->save()) {
            $formAction = ['/forms/ht-report-prehistory/update', 'id' => $model->id];
            return $this->renderPartial('_form', [
                'model'      => $model,
                'formAction' => $formAction,
            ]);
        } elseif ($loadResult && !$model->date) {
            // If date is empty than no data have to be stored
            return '';
        } else {
            $formAction = ['/forms/ht-report-prehistory/create', 'type' => $type];
            $html = $this->renderPartial('_form', [
                'model'      => $model,
                'formAction' => $formAction,
            ]);

            if ($loadResult) {
                // Meaning validation error occurred
                throw new HttpException(400, $html);
            }

            return $html;
        }
    }

    /**
     * Updates an existing HtReportPrehistory model.
     * @param integer $id
     * @return string
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
        }

        return $this->renderPartial('_form', [
            'model'      => $model,
            'formAction' => ['/forms/ht-report-prehistory/update', 'id' => $model->id],
        ]);
    }

    /**
     * Deletes an existing HtReportPrehistory model.
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
     * Finds the HtReportPrehistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HtReportPrehistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HtReportPrehistory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
