<?php

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PatientPrehistory $model
 * @var app\modules\admin\models\Patient $patient
 * @var array $prehistoryItemsArray
 */

$this->title = Yii::t('app', 'Create {modelClass} for {patient}', [
    'modelClass' => 'Patient Prehistory',
    'patient' => $patient->name,
]);
?>
<div class="patient-prehistory-create">

    <?= $this->render('_form', [
        'model' => $model,
        'patient' => $patient,
        'prehistoryItemsArray' => $prehistoryItemsArray,
    ]) ?>

</div>
