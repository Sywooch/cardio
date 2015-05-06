<?php

use yii\db\Schema;

class m140611_184308_new_pci_report_table extends \yii\db\Migration
{
    private $table = '{{pci_report}}';

    public function up()
    {
        $this->createTable(
            $this->table,
            [
                'id int(11) not null auto_increment',
                'patient_id int(11) not null',
                'created_at datetime',
                'created_by int(10) unsigned',
                'updated_at datetime',
                'updated_by int(10) unsigned',
                'movie_date datetime',
                'clinical tinyint(1) not null',
                'supervisor_present tinyint(1) not null',
                'phd_candidate varchar(100)',
                'supervised_cardiologist varchar(100)',
                'small_description text null',
                'primary key(id)',
                'key pci_report__patient_id__to__patient__id (patient_id)',
                'constraint pci_report__patient_id__to__patient_id foreign key (patient_id) references patient (id) on update cascade',
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
