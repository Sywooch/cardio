<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\search\Patients $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="patients-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patienten_nr') ?>

    <?= $form->field($model, 'naam') ?>

    <?= $form->field($model, 'bsn_number') ?>

    <?= $form->field($model, 'geslacht') ?>

    <?php // echo $form->field($model, 'geboortedatum') ?>

    <?php // echo $form->field($model, 'straat') ?>

    <?php // echo $form->field($model, 'postcode') ?>

    <?php // echo $form->field($model, 'plaats') ?>

    <?php // echo $form->field($model, 'land') ?>

    <?php // echo $form->field($model, 'telefoon') ?>

    <?php // echo $form->field($model, 'meisjesnaam') ?>

    <?php // echo $form->field($model, 'is_overleden') ?>

    <?php // echo $form->field($model, 'overleden_op') ?>

    <?php // echo $form->field($model, 'huisarts') ?>

    <?php // echo $form->field($model, 'verzekering') ?>

    <?php // echo $form->field($model, 'fds_polis_nr') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
