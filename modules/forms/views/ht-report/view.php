<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\HtReport $model
 * @var array ccReports
 * @var app\modules\forms\models\HtReportPrehistory $infarctPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $pciPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $cabgPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $addPrehistories
 * @var app\modules\forms\models\HtReportPrehistory $echoPrehistories
 */

$this->title = Yii::t('app', 'View {modelClass} for {patient}', [
'modelClass' => 'HT Report',
'patient' => $model->patient->name,
]);

?>

<div class="stub"></div>

<?= $this->render('_form', [
    'model' => $model,
    'infarctPrehistories' => $infarctPrehistories,
    'pciPrehistories' => $pciPrehistories,
    'cabgPrehistories' => $cabgPrehistories,
    'addPrehistories' => $addPrehistories,
    'echoPrehistories' => $echoPrehistories,
    'isView' => true,
]) ?>
