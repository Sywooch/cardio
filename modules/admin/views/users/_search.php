<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\search\Users $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'naam') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'doc_naam') ?>

    <?= $form->field($model, 'rights') ?>

    <?php // echo $form->field($model, 'datum_aanmaak') ?>

    <?php // echo $form->field($model, 'datum_stop') ?>

    <?php // echo $form->field($model, 'omschrijving') ?>

    <?php // echo $form->field($model, 'locatie') ?>

    <?php // echo $form->field($model, 'telefoon') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'initials') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'surname') ?>

    <?php // echo $form->field($model, 'maiden_name') ?>

    <?php // echo $form->field($model, 'insertion') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'doc_id') ?>

    <?php // echo $form->field($model, 'abbreviation') ?>

    <?php // echo $form->field($model, 'function') ?>

    <?php // echo $form->field($model, 'disabled') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
