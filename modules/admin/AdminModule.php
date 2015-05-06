<?php

namespace app\modules\admin;

use yii\base\Module;
use Yii;

class AdminModule extends Module
{
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/admin/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath'       => '@app/modules/admin/messages',
            'fileMap'        => [
                'modules/admin/app' => 'app.php',
            ],
        ];
    }
}
