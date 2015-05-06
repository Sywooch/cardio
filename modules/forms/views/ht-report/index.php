<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var app\modules\forms\models\search\HtReport $searchModel
 * @var yii\data\ActiveDataProvider $dataProvider
 */

$this->title = Yii::t('app', 'Ht Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ht-report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Ht Report',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_id',
            'ccr_report_id',
            'created_at',
            'created_by',
            // 'small_description:ntext',
            // 'clinical',
            // 'discuss_date',
            // 'thoracic_surgeon',
            // 'intervention_cardiologist',
            // 'cardiologist',
            // 'refferring_cardiologist',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
