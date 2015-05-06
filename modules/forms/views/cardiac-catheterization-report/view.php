<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\CardiacCatheterizationReport $model
 */

$this->title = Yii::t('app', 'View {modelClass} for {patient}', [
  'modelClass' => 'Cardiac Catheterization Report',
  'patient' => $patient->name,
]);

?>

<div class="stub"></div>

<?= $this->render('_form', [
    'model' => $model,
    'patient' => $patient,
    'isView' => true,
]) ?>

