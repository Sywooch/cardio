<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\HtReport $model
 */

$this->title = Yii::t('app', 'Create {modelClass} for {patientName}', [
    'modelClass' => 'Ht Report',
    'patientName' => $model->patient->name,
]);
?>
<div class="ht-report-create">

    <?= $this->render('_form', [
        'model' => $model,
        'isView' => false,
        'infarctPrehistories' => [],
        'pciPrehistories' => [],
        'cabgPrehistories' => [],
        'addPrehistories' => [],
        'echoPrehistories' => [],
    ]) ?>

</div>
