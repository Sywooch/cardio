<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace forms\assets;

use yii\web\AssetBundle;

class PatientPrehistoryAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/forms/catheterization-form/bootstrap.css',
        'css/forms/catheterization-form/custom_style.css',
        'css/forms/patient-prehistory-form/additional.css',
    ];

    public $js = [
        'js/scripts.js',
        'js/forms/patient-prehistory/scripts.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
