<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\modules\admin\models\search\CardiacCatheterizationReport $searchModel
 */

$this->title = Yii::t('app', 'Cardiac Catheterization Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cardiac-catheterization-report-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
  'modelClass' => 'Cardiac Catheterization Report',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'patient_id',
            'created_at',
            'created_by',
            'updated_at',
            // 'updated_by',
            // 'movie_date',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
