<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\forms\models\HtReportPrehistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ht-report-prehistory-form">

    <?php $form = ActiveForm::begin(['id' => 'ht-report-prehistory-form-' . rand(), 'action' => $formAction]); ?>

    <?= $form->field($model, 'date',
            [
                'inputOptions' => ['placeholder' => $model->attributeLabels()['date'] . ' dd/mm/yyyy']  ,
                'template' => "{input}\n",
            ]
        )->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'description',
        [
            'inputOptions' => ['placeholder' => $model->attributeLabels()['description']]  ,
            'template' => "{input}\n",
        ]
    )->textInput() ?>

    <?= $form->field($model, 'date', [
        'inputOptions' => ['placeholder' => $model->attributeLabels()['date'] . ' dd/mm/yyyy'],
        'options' => ['class' => 'form-group full-width'],
        'template' => "{error}\n",
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
