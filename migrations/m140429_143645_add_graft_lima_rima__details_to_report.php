<?php

use yii\db\Schema;

class m140429_143645_add_graft_lima_rima__details_to_report extends \yii\db\Migration
{
    private $table = '{{cardiac_catheterization_report}}';

    public function up()
    {
        $this->addColumn(
            $this->table,
            'graft1_details',
            'varchar(512) default null'
        );

        $this->addColumn(
            $this->table,
            'graft2_details',
            'varchar(512) default null'
        );

        $this->addColumn(
            $this->table,
            'lima_details',
            'varchar(512) default null'
        );

        $this->addColumn(
            $this->table,
            'rima_details',
            'varchar(512) default null'
        );
    }

    public function down()
    {
        $this->dropColumn($this->table, 'graft1_details');
        $this->dropColumn($this->table, 'graft2_details');
        $this->dropColumn($this->table, 'lima_details');
        $this->dropColumn($this->table, 'rima_details');
    }
}
