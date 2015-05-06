<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 09.10.2014
 * Time: 12:06
 *
 * @author Degtyaruk Andrey <hlogeon1@gmail.com>
 *
 *
 * @var \yii\web\View $this
 * @var string $content
 *
 */
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="container-fluid">
        <div class="page-header" id="title-header">
            <a href="/"><h1><small>Cardio</small></h1></a>
        </div>
      <div class="row-fluid">

        <div class="span2">

                <?php
                echo Menu::widget([
                    'id' => 'side-menu',
                    'options' => ['class' => 'nav'],
                    'items' => [
                        ['label' => 'Users', 'url' => ['/admin/users/index']],
                        ['label' => 'Patients', 'url' => ['/admin/patient/index']],
                        Yii::$app->user->isGuest ?
                            ['label' => 'Login', 'url' => ['/site/login']] :
                            ['label' => 'Logout (' . Yii::$app->user->identity->naam . ')',
                             'url'   => ['/site/logout'],
                             'linkOptions' => ['data-method' => 'post']],
                    ],
                ]);
                ?>
        </div>
        <div class="span10" id="main-wrap">
            <div id="page-wrapper">
                <?= Breadcrumbs::widget([
                    'itemTemplate' => "<li>{link} <span class=\"divider\">/</span></li>\n",
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
        </div>
      </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>