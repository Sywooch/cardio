<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\search\Users $searchModel
 */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create User', [
  'modelClass' => 'Users',
]), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php $form = ActiveForm::begin(); ?>
    <div class="find-users form-group">
        <?= Html::input('text', 'naam', null, ['class' => 'form-control', 'maxlength' => 32, 'placeholder' => 'Enter username']) ?>
        <?= Html::input('text', 'surname', null, ['class' => 'form-control', 'maxlength' => 32, 'placeholder' => 'Enter surname']) ?>
        <?= Html::submitButton(Yii::t('app', 'Find user'), ['class' => 'btn btn-primary']); ?>
    </div>
    <?php ActiveForm::end(); ?>

    <ul class="nav nav-tabs">
        <?php if (!$onDisabledTab):?>
            <li class="active"><a>Active</a></li>
            <li><?= Html::a(Yii::t('app', 'Disabled'), ['users/index', 'Users[disabled]' => 1], ['class' => '']) ?></li>
        <?php else: ?>
            <li><?= Html::a(Yii::t('app', 'Active'), ['users/index', 'Users[disabled]' => 0], ['class' => '']) ?></li>
            <li class="active"><a>Disabled</a></li>
        <?php endif ?>
    </ul>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'naam',
            //'password',
            'doc_naam',
            'rights',
            // 'datum_aanmaak',
            // 'datum_stop',
            'omschrijving:ntext',
            // 'locatie',
            // 'telefoon',
            // 'title',
            // 'initials',
            'first_name',
            'surname',
            // 'maiden_name',
            // 'insertion',
            // 'department',
            // 'doc_id',
            // 'abbreviation',
            'function',
            // 'disabled',

            [
                'class' => 'app\components\helpers\BootstrapActionColumn',
                'template' => '{view} {update} {activate} {deactivate} {delete}',
                'buttons' => [
                    'activate' => function ($url, $model) {
                        if ($model->disabled) {
                            return Html::a('<i class=" icon-plus"></i>', $url, [
                                'title' => Yii::t('yii', 'Activate'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to activate this user?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        } else {
                            return '';
                        }
                    },
                    'deactivate' => function ($url, $model) {
                        if (!$model->disabled) {
                            return Html::a('<i class=" icon-minus"></i>', $url, [
                                'title' => Yii::t('yii', 'Deactivate'),
                                'data-confirm' => Yii::t('yii', 'Are you sure you want to deactivate this user?'),
                                'data-method' => 'post',
                                'data-pjax' => '0',
                            ]);
                        } else {
                            return '';
                        }
                    }
                ],
            ],
        ],
    ]); ?>

</div>
