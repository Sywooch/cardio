<?php

use yii\db\Schema;

class m140622_110603_new_ht_report_table extends \yii\db\Migration
{
    private $table = '{{%ht_report}}';

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
                'patient_id' => Schema::TYPE_INTEGER . '(11) not null',
                'ccr_report_id' => Schema::TYPE_INTEGER . '(11) not null',
                'created_at' => Schema::TYPE_DATETIME,
                'created_by' => Schema::TYPE_INTEGER . '(11) unsigned',
                'small_description' => Schema::TYPE_TEXT,
                'clinical' => Schema::TYPE_BOOLEAN,
                'discuss_date' => Schema::TYPE_DATETIME,
                'thoracic_surgeon' => Schema::TYPE_STRING,
                'intervention_cardiologist' => Schema::TYPE_STRING,
                'cardiologist' => Schema::TYPE_STRING,
                'referring_cardiologist' => Schema::TYPE_STRING,
                'key patient_id__to__patient__id (patient_id)',
                'constraint ht_report___patient_id__to__patient__id foreign key (patient_id) references patient (id) on update cascade',
                'key create_by__to__users__id (created_by)',
                'constraint ht_report__created_by__to__users__id foreign key (created_by) references users (id) on update cascade',
                'key ccr_report_id__to__ccr__id (ccr_report_id)',
                'constraint ht_report__ccr_report_id__to__ccr__id foreign key (ccr_report_id) references cardiac_catheterization_report (id) on update cascade',
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
