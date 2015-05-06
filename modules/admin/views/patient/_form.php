<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pid')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 1024]) ?>

    <?= $form->field($model, 'bsn')->textInput(['maxlength' => 2048]) ?>

    <?= $form->field($model, 'sex')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'birth_date')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 2048]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => 1024]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'maiden_name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'died')->textInput() ?>

    <?= $form->field($model, 'died_at')->textInput() ?>

    <?= $form->field($model, 'general_practitioner_id')->textInput() ?>

    <?= $form->field($model, 'insurance')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'fds_polis_nr')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
