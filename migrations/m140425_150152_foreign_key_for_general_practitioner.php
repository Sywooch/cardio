<?php

use yii\db\Schema;

class m140425_150152_foreign_key_for_general_practitioner extends \yii\db\Migration
{
    private $keyName = 'gen_pract_id__to__gen_pract__id';
    public function up()
    {
        $this->addForeignKey(
            $this->keyName,
            '{{patient}}',
            'general_practitioner_id',
            '{{general_practitioner}}',
            'id',
            'restrict',
            'cascade'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            $this->keyName,
            '{{patient}}'
        );
    }
}
