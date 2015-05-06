<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\models\Patient $model
 * @var yii\data\ActiveDataProvider $patientPrehistoryDataProvider
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pid',
            'name',
            'bsn',
            'sex',
            'birth_date',
            'address',
            'zip_code',
            'city',
            'country',
            'phone',
            'maiden_name',
            'died',
            'died_at',
            'general_practitioner_id',
            'insurance',
            'fds_polis_nr',
        ],
    ]) ?>

    <div class="row-fluid">
        <p>
            <?= Html::a(Yii::t('app', 'Create {modelClass}', [
                'modelClass' => 'Cardiac Catheterization Report',
            ]), ['/forms/cardiac-catheterization-report/create', 'patient_id' => $model->id], ['class' => 'btn btn-success new-window']) ?>

            <?= Html::a(Yii::t('app', 'Create {modelClass}', [
                'modelClass' => 'PCI Report',
            ]), ['/forms/pci-report/create', 'patient_id' => $model->id], ['class' => 'btn btn-success new-window']) ?>

            <?= Html::a(Yii::t('app', 'HT Report'),
                ['/forms/ht-report/create', 'patient_id' => $model->id], ['class' => 'btn btn-success new-window']);
            ?>

            <?= Html::a(Yii::t('app', 'Add prehistory item'),
                ['/forms/patient-prehistory/create', 'patient_id' => $model->id], ['class' => 'btn btn-success new-window']);
            ?>
        </p>
    </div>

    <div class="row-fluid">
        <h4>HC Reports</h4>

        <?= GridView::widget([
            'dataProvider' => $reportDataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'created_at',
                'created_by',
                'updated_at',
                'updated_by',
                'movie_date',
                // 'clinical',
                // 'supervisor_present',
                // 'phd_candidate',
                // 'supervised_cardiologist',
                // 'complication',
                // 'complication_details:ntext',
                // 'lm',
                // 'rdap',
                // 'rdam',
                // 'rdad',
                // 'd1',
                // 'd2',
                // 's1',
                // 'al',
                // 'cxp',
                // 'cxm',
                // 'mo',
                // 'cxd',
                // 'plx1',
                // 'plx2',
                // 'plx3',
                // 'rca',
                // 'ma',
                // 'rdp',
                // 'plr1',
                // 'plr2',
                // 'plr3',
                // 'graft1',
                // 'graft2',
                // 'lima',
                // 'rima',
                // 'cag_details:ntext',
                // 'proposal:ntext',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(
                                '<span class="icon-eye-open"></span>',
                                ['/forms/cardiac-catheterization-report/view', 'id' => $model->id],
                                [
                                    'title' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                                    'class' => 'new-window',
                                ]
                            );
                        },
                        'update' => function ($url, $model) {
                            if ($model->isUpdatable()) {
                                return Html::a(
                                    '<span class="icon-pencil"></span>',
                                    ['/forms/cardiac-catheterization-report/update', 'id' => $model->id],
                                    [
                                        'title' => Yii::t('yii', 'Update'),
                                        'data-pjax' => '0',
                                        'class' => 'new-window',
                                    ]
                                );
                            }

                            return '';
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

    <div class="row-fluid">
        <h4>PCI Reports</h4>
        <?= GridView::widget([
            'dataProvider' => $pciDataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'created_at',
                'created_by',
                'updated_at',
                'updated_by',
                'movie_date',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(
                                '<span class="icon-eye-open"></span>',
                                ['/forms/pci-report/view', 'id' => $model->id],
                                [
                                    'title' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                                    'class' => 'new-window',
                                ]
                            );
                        },
                        'update' => function ($url, $model) {
                            if ($model->isUpdatable()) {
                                return Html::a(
                                    '<span class="icon-pencil"></span>',
                                    ['/forms/pci-report/update', 'id' => $model->id],
                                    [
                                        'title' => Yii::t('yii', 'Update'),
                                        'data-pjax' => '0',
                                        'class' => 'new-window',
                                    ]
                                );
                            }

                            return '';
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

    <div class="row-fluid">
        <h4>HT Reports</h4>
        <?= GridView::widget([
            'dataProvider' => $htDataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'created_at',
                'discuss_date',
                'clinical',
                'thoracic_surgeon',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a(
                                '<span class="icon-eye-open"></span>',
                                ['/forms/ht-report/view', 'id' => $model->id],
                                [
                                    'title' => Yii::t('yii', 'View'),
                                    'data-pjax' => '0',
                                    'class' => 'new-window',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

    <div class="row-fluid">
        <h4>Prehistory items</h4>
        <?= GridView::widget([
            'dataProvider' => $patientPrehistoryDataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'date',
                [
                    'label' => 'Prehistory Item',
                    'value' => 'prehistoryItem.name',
                ],
                'text',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a(
                                '<span class="icon-pencil"></span>',
                                ['/forms/patient-prehistory/update', 'id' => $model->id],
                                [
                                    'title' => Yii::t('yii', 'Update'),
                                    'data-pjax' => '0',
                                    'class' => 'new-window',
                                ]
                            );
                        },
                        'delete' => function ($url, $model) {
                            return Html::a(
                                '<span class="icon-trash"></span>',
                                ['/forms/patient-prehistory/delete', 'id' => $model->id],
                                [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                                ]
                            );
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>

</div>
