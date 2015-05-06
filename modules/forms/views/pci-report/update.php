<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Patient $patient
 */

$this->title = Yii::t('app', 'Update {modelClass} for {patient}', [
  'modelClass' => 'PCI Report',
  'patient' => $patient->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patient {pid} {patient_name}', [
    'pid' => $patient->pid,
    'patient_name' => $patient->name,
]), 'url' => ['/admin/patient/view', 'id' => $patient->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="pci-report-create">

    <?= $this->render('_form', [
        'model' => $model,
        'patient' => $patient,
        'isView' => false,
    ]) ?>

</div>
