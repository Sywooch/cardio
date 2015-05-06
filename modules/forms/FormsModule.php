<?php

namespace app\modules\forms;

use yii\base\Module;

use Yii;

class FormsModule extends Module
{
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['modules/forms/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@app/modules/forms/messages',
            'fileMap' => [
                'modules/forms/app' => 'app.php',
            ],
        ];
    }
}
