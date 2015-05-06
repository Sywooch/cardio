<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\PciReport $model
 * @var app\modules\admin\models\Patient $patient
 */

$this->title = Yii::t('app', 'View {modelClass} for {patient}', [
  'modelClass' => 'PCI Report',
  'patient' => $patient->name,
]);

?>

<div class="stub"></div>

<?= $this->render('_form', [
    'model' => $model,
    'patient' => $patient,
    'isView' => true,
]) ?>

