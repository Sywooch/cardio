<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\Users $model
 */

$this->title = $model->naam;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-view">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <div class="panel panel-default">
        <div class="panel-heading">
            cardionl
        </div>

        <div class="panel-body">
            <div class="box-half">
                <div class="box-row">
                <?= $model->attributeLabels()['naam'] ?>: <?= $model->naam?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['datum_aanmaak'] ?>: <?= $model->datum_aanmaak?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['rights'] ?>: <?= $model->rights?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['doc_id'] ?>: <?= $model->doc_id?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['function'] ?>: <?= $model->function?>
                </div>
            </div>
            <div class="box-half">
                <div class="box-row">
                <?= $model->attributeLabels()['password'] ?>: <?= $model->password?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['datum_stop'] ?>: <?= $model->datum_stop?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['doc_naam'] ?>: <?= $model->doc_naam?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['department'] ?>: <?= $model->department?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            user
        </div>

        <div class="panel-body">
            <div class="box-half">
                <div class="box-row">
                <?= $model->attributeLabels()['title'] ?>: <?= $model->title?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['initials'] ?>: <?= $model->initials?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['first_name'] ?>: <?= $model->first_name?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['surname'] ?>: <?= $model->surname?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['maiden_name'] ?>: <?= $model->maiden_name?>
                </div>
            </div>
            <div class="box-half">
                <div class="box-row">
                <?= $model->attributeLabels()['insertion'] ?>: <?= $model->insertion?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['locatie'] ?>: <?= $model->locatie?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['telefoon'] ?>: <?= $model->telefoon?>
                </div>
                <div class="box-row">
                <?= $model->attributeLabels()['abbreviation'] ?>: <?= $model->abbreviation?>
                </div>
            </div>
        </div>
    </div>

</div>
