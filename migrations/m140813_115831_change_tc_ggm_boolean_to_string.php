<?php

use yii\db\Schema;
use yii\db\Migration;

class m140813_115831_change_tc_ggm_boolean_to_string extends Migration
{
    private $table = '{{ht_report}}';
    private $column = 'ischemia_detection_tc_ggm';

    public function up()
    {
        $this->alterColumn($this->table, $this->column, Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->alterColumn($this->table, $this->column, Schema::TYPE_BOOLEAN);
    }
}
