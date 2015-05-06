<?php

use yii\db\Schema;

class m140428_204744_small_description_column_in_report_table extends \yii\db\Migration
{
    private $table = '{{cardiac_catheterization_report}}';
    private $column = 'small_description';

    public function up()
    {
        $this->addColumn(
            $this->table,
            $this->column,
            'text default null'
        );

    }

    public function down()
    {
        $this->dropColumn($this->table, $this->column);
    }
}
