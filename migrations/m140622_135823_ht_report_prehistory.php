<?php

use yii\db\Schema;

class m140622_135823_ht_report_prehistory extends \yii\db\Migration
{
    private $table = '{{%ht_report_prehistory}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            $this->table,
            [
                'id' => Schema::TYPE_PK,
                'date' => Schema::TYPE_STRING . ' not null',
                'description' => Schema::TYPE_TEXT,
                'type' => Schema::TYPE_STRING . ' not null', // Could be infarct, pci, CABG, Remaining
                'ht_report_id' => Schema::TYPE_INTEGER . '(11) not null',
                'key ht_report_id__to__ht_report__id (ht_report_id)',
                'constraint ht_report_id__to__ht_report__id foreign key (ht_report_id) references ht_report (id) on update cascade',
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
