<?php

use yii\db\Schema;
use yii\db\Migration;

class m150308_142526_create_patient_prehistory_table extends Migration
{
    private $table = "{{patient_prehistory}}";

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'patient_id' => Schema::TYPE_INTEGER,
            'prehistory_item_id' => Schema::TYPE_INTEGER,
            'date' => Schema::TYPE_DATE,
            'text' => Schema::TYPE_TEXT,
            'key patient_id__to__patient__id (patient_id)',
            'constraint patient_prehistory___patient_id__to__patient__id foreign key (patient_id) references patient (id) on update cascade',
            'key prehistory_item_id__to__prehistory_item__id (prehistory_item_id)',
            'constraint patient_prehistory__prehistory_item_id foreign key (prehistory_item_id) references prehistory_item (id) on update cascade',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
