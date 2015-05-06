<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace forms\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HtReportAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/forms/catheterization-form/bootstrap.css',
        'css/forms/catheterization-form/custom_style.css',
        'css/forms/ht-report/styles.css',
    ];
    public $js = [
        'js/forms/ht-report/scripts.js',
        'js/forms/catheterization-form/stub.js',
        'js/forms/catheterization-form/print.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
