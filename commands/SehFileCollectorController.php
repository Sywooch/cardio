<?php

namespace app\commands;

use Yii;

/**
 * Collect emergency info files and place them in store location
 */
class SehFileCollectorController extends \yii\console\Controller
{
    public function actionIndex()
    {
        Yii::$app->sehFileCollector->checkoutRemoteFolder(date('Ym'))
                 ->checkoutTemporaryFolder();
    }
}
