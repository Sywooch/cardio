<?php

use yii\db\Schema;

class m140528_192955_make_pid_have_default_value extends \yii\db\Migration
{
    private $table = '{{seh_visits}}';
    private $column = 'pid';

    public function up()
    {
        $this->alterColumn($this->table, $this->column, 'varchar(12) default null');
    }

    public function down()
    {
        $this->alterColumn($this->table, $this->column, 'varchar(12) not null');
    }
}
