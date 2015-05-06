<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\HtReportPrehistory */

$this->title = Yii::t('modules/forms/app', 'Update {modelClass}: ', [
    'modelClass' => 'Ht Report Prehistory',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('modules/forms/app', 'Ht Report Prehistories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('modules/forms/app', 'Update');
?>
<div class="ht-report-prehistory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
