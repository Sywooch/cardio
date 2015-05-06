<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'bootstrap/css/bootstrap.css',
        'css/site.css',
        'css/pagination.css',
        'css/navigation.css',
//        'css/sb-admin.css',
    ];
    public $js = [
        'js/scripts.js',
        'js/jquery.js',
        'bootstrap/js/bootstrap.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];


    public function init()
    {
        parent::init();

        Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = [
          'depends' => []
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'css' => [],
            'js' => [],
        ];
    }
}
