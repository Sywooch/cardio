<?php

namespace app\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Allows to store array or object variables in database field.
 */
class CompoundFieldBehavior extends Behavior
{
    public $attributes;

    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
        ];
    }

    public function afterFind()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->{$attribute} = @unserialize($this->owner->{$attribute});
        }
    }

    public function beforeSave($insert)
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->{$attribute} = serialize($this->owner->{$attribute});
        }
    }
}
