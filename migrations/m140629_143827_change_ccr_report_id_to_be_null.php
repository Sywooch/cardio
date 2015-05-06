<?php

use yii\db\Schema;

class m140629_143827_change_ccr_report_id_to_be_null extends \yii\db\Migration
{
    public function up()
    {
        $this->alterColumn('{{ht_report}}', 'ccr_report_id', Schema::TYPE_INTEGER . '(11) default null');
    }

    public function down()
    {
        $this->alterColumn('{{ht_report}}', 'ccr_report_id', Schema::TYPE_INTEGER . '(11) not null');
    }
}
