<?php

use yii\db\Schema;

class m140429_130748_rename_cxx_to_rcxx_in_report_table extends \yii\db\Migration
{
    private $table = '{{cardiac_catheterization_report}}';

    public function up()
    {
        $this->renameColumn(
            $this->table,
            'cxp',
            'rcxp'
        );

        $this->renameColumn(
            $this->table,
            'cxm',
            'rcxm'
        );

        $this->renameColumn(
            $this->table,
            'cxd',
            'rcxd'
        );
    }

    public function down()
    {
        $this->renameColumn(
            $this->table,
            'rcxp',
            'cxp'
        );

        $this->renameColumn(
            $this->table,
            'rcxm',
            'cxm'
        );

        $this->renameColumn(
            $this->table,
            'rcxd',
            'cxd'
        );
    }
}
