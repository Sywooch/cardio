<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Users $model
 */

$this->title = Yii::t('app', 'Create User', [
  'modelClass' => 'Users',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
