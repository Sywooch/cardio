<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\modules\admin\\models\Users $model
 */

$this->title = Yii::t('app', 'Update User: ', [
  'modelClass' => 'Users',
]) . ' ' . $model->naam;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->naam, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="users-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
