<?php

use yii\db\Schema;

class m140527_081827_rename_emergency_to_seh_visits extends \yii\db\Migration
{
    public function up()
    {
        $this->renameTable('{{emergency_check}}', '{{seh_visits}}');
    }

    public function down()
    {
        $this->renameTable('{{seh_visits}}', '{{emergency_check}}');
    }
}
