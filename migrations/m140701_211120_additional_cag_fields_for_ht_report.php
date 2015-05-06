<?php

use yii\db\Schema;

class m140701_211120_additional_cag_fields_for_ht_report extends \yii\db\Migration
{
    private $table = '{{ht_report}}';

    public function up()
    {
        $this->addColumn($this->table, 'cag_graft1_details', Schema::TYPE_STRING . '(512)');
        $this->addColumn($this->table, 'cag_graft2_details', Schema::TYPE_STRING . '(512)');
        $this->addColumn($this->table, 'cag_lima_details', Schema::TYPE_STRING . '(512)');
        $this->addColumn($this->table, 'cag_rima_details', Schema::TYPE_STRING . '(512)');
        $this->addColumn($this->table, 'cag_rcxp', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rcxm', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_rcxd', Schema::TYPE_INTEGER . '(3)');

        $this->dropColumn($this->table, 'cag_cxm');
        $this->dropColumn($this->table, 'cag_cxd');
    }

    public function down()
    {
        $this->dropColumn($this->table, 'cag_graft1_details');
        $this->dropColumn($this->table, 'cag_graft2_details');
        $this->dropColumn($this->table, 'cag_lima_details');
        $this->dropColumn($this->table, 'cag_rima_details');
        $this->dropColumn($this->table, 'cag_rcxp');
        $this->dropColumn($this->table, 'cag_rcxm');
        $this->dropColumn($this->table, 'cag_rcxd');

        $this->addColumn($this->table, 'cag_cxm', Schema::TYPE_INTEGER . '(3)');
        $this->addColumn($this->table, 'cag_cxd', Schema::TYPE_INTEGER . '(3)');
    }
}
