<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\search\CardiacCatheterizationReport $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="cardiac-catheterization-report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'movie_date') ?>

    <?php // echo $form->field($model, 'clinical') ?>

    <?php // echo $form->field($model, 'supervisor_present') ?>

    <?php // echo $form->field($model, 'phd_candidate') ?>

    <?php // echo $form->field($model, 'supervised_cardiologist') ?>

    <?php // echo $form->field($model, 'complication') ?>

    <?php // echo $form->field($model, 'complication_details') ?>

    <?php // echo $form->field($model, 'lm') ?>

    <?php // echo $form->field($model, 'rdap') ?>

    <?php // echo $form->field($model, 'rdam') ?>

    <?php // echo $form->field($model, 'rdad') ?>

    <?php // echo $form->field($model, 'd1') ?>

    <?php // echo $form->field($model, 'd2') ?>

    <?php // echo $form->field($model, 's1') ?>

    <?php // echo $form->field($model, 'al') ?>

    <?php // echo $form->field($model, 'cxp') ?>

    <?php // echo $form->field($model, 'cxm') ?>

    <?php // echo $form->field($model, 'mo') ?>

    <?php // echo $form->field($model, 'cxd') ?>

    <?php // echo $form->field($model, 'plx1') ?>

    <?php // echo $form->field($model, 'plx2') ?>

    <?php // echo $form->field($model, 'plx3') ?>

    <?php // echo $form->field($model, 'rca') ?>

    <?php // echo $form->field($model, 'ma') ?>

    <?php // echo $form->field($model, 'rdp') ?>

    <?php // echo $form->field($model, 'plr1') ?>

    <?php // echo $form->field($model, 'plr2') ?>

    <?php // echo $form->field($model, 'plr3') ?>

    <?php // echo $form->field($model, 'graft1') ?>

    <?php // echo $form->field($model, 'graft2') ?>

    <?php // echo $form->field($model, 'lima') ?>

    <?php // echo $form->field($model, 'rima') ?>

    <?php // echo $form->field($model, 'cag_details') ?>

    <?php // echo $form->field($model, 'proposal') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
