<?php

namespace app\modules\forms\controllers;

use app\modules\forms\models\PciReportArtery;

use Yii;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\controllers\BaseController;

/**
 * Artery Controller implements CRUD for Artery Model
 */
class PciReportArteryController extends BaseCpntroller
{

    /**
     * Creates new Artery Model.
     *
     * @param int $pci_report_id (optional)
     * @return string Rendered artery form
     */
    public function actionCreate($pci_report_id = null)
    {
        $artery = new PciReportArtery();
        $artery->artery = '0';

        $loadResult = $artery->load(Yii::$app->request->post());
        $artery->pci_report_id = $pci_report_id;
        $artery->ic_iv = 'ic';
        if ($loadResult && $artery->artery !== '0' && $artery->save()) {
            return json_encode($artery->attributes);
        } else {
            return $this->renderPartial('create', [
                'model' => $artery,
            ]);
        }
    }

    /**
     * Update Artery Model.
     *
     * @param int $id
     */
    public function actionUpdate($id)
    {
        $model = PciReportArtery::findOne($id);

        $model->load(Yii::$app->request->post());
        $model->save();
    }
}
