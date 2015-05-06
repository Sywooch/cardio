<?php

use yii\db\Schema;

class m140528_194931_change_departure_date_being_varchar extends \yii\db\Migration
{
    private $table = '{{seh_visits}}';
    private $column = 'departure_date';
    private $column2 = 'arrival_date';

    public function up()
    {
        $this->alterColumn(
            $this->table,
            $this->column,
            'varchar(12) default null'
        );

        $this->alterColumn(
            $this->table,
            $this->column2,
            'varchar(12) default null'
        );
    }

    public function down()
    {
        $this->alterColumn(
            $this->table,
            $this->column,
            'datetime'
        );

        $this->alterColumn(
            $this->table,
            $this->column2,
            'datetime'
        );
    }
}
