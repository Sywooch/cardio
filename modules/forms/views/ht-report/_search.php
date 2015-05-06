<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\search\HtReport $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="ht-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'ccr_report_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'small_description') ?>

    <?php // echo $form->field($model, 'clinical') ?>

    <?php // echo $form->field($model, 'discuss_date') ?>

    <?php // echo $form->field($model, 'thoracic_surgeon') ?>

    <?php // echo $form->field($model, 'intervention_cardiologist') ?>

    <?php // echo $form->field($model, 'cardiologist') ?>

    <?php // echo $form->field($model, 'refferring_cardiologist') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
