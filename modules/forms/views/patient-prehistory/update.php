<?php

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PatientPrehistory $model
 * @var app\modules\admin\models\Patient $patient
 * @var array $prehistoryItemsArray
 */

$this->title = Yii::t('app', 'Update {modelClass} with id {id} for {patient}', [
    'modelClass' => 'Patient Prehistory',
    'patient' => $patient->name,
    'id' => $model->id,
]);
?>
<div class="patient-prehistory-update">

    <?= $this->render('_form', [
        'model' => $model,
        'patient' => $patient,
        'prehistoryItemsArray' => $prehistoryItemsArray,
    ]) ?>

</div>
