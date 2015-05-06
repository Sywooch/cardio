<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\search\Patient $searchModel
 */

$this->title = Yii::t('app', 'Patients');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-index">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="find-patients form-group">
        <?= Html::input('text', 'pid', null, ['class' => 'form-control', 'maxlength' => 32, 'placeholder' => 'Enter patient number']) ?>
        <?= Html::submitButton(Yii::t('app', 'Find patient'), ['class' => 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pid',
            'name',
            'bsn',
            'sex',
            // 'birth_date',
            // 'address',
            // 'zip_code',
            // 'city',
            // 'country',
            // 'phone',
            // 'maiden_name',
            // 'died',
            // 'died_at',
            // 'general_practitioner_id',
            // 'insurance',
            // 'fds_polis_nr',

            [
                'class' => 'app\components\helpers\BootstrapActionColumn',
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>

</div>
