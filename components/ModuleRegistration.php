<?php

namespace app\components;

use yii\base\Component;
use Yii;

/**
 * Module loader to fix inter-module dependencies
 */
class ModuleRegistration extends Component
{

    public function init()
    {
        parent::init();
        $this->registerModules();
    }

    public function registerModules()
    {
        $modules = Yii::$app->getModules();
        foreach ($modules as $id => $module) {
            Yii::createObject($module, [$id, Yii::$app]);
        }
    }
}
