<?php

use yii\db\Schema;

class m140608_150440_create_pci_table extends \yii\db\Migration
{
    private $table = '{{pci}}';

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
                'complication tinyint(1)',
                'complication_details text',
                'lm tinyint(3)',
                'rdap tinyint(3)',
                'rdam tinyint(3)',
                'rdad tinyint(3)',
                'd1 tinyint(3)',
                'd2 tinyint(3)',
                's1 tinyint(3)',
                'al tinyint(3)',
                'rcxp tinyint(3)',
                'rcxm tinyint(3)',
                'mo tinyint(3)',
                'rcxd tinyint(3)',
                'plx1 tinyint(3)',
                'plx2 tinyint(3)',
                'plx3 tinyint(3)',
                'rca tinyint(3)',
                'ma tinyint(3)',
                'rdp tinyint(3)',
                'plr1 tinyint(3)',
                'plr2 tinyint(3)',
                'plr3 tinyint(3)',
                'graft1 tinyint(3)',
                'graft1_details varchar(512) default null',
                'graft2 tinyint(3)',
                'graft2_details varchar(512) default null',
                'lima tinyint(3)',
                'lima_details varchar(512) default null',
                'rima tinyint(3)',
                'rima_details varchar(512) default null',
                'cag_details text',
                'proposal text',
                'small_description text default null',
                'cardiac_catheterization_report_id int(11) default null',
                'primary key(id)',
                'key patient_id__to__patient_id (patient_id)',
                'constraint pci_patient_id__to__patient_id foreign key (patient_id) references patient (id) on update cascade',
                'key create_by__to__users_id (created_by)',
                'constraint pci_created_by__to__users_id foreign key (created_by) references users (id) on update cascade',
                'key updated_by__to__users_id (updated_by)',
                'constraint pci_updated_by__to__users_id foreign key (updated_by) references users (id) on update cascade',
                'key cardiac_catheterization_report_id__to__ccr_id (cardiac_catheterization_report_id)',
                'constraint pci_ccr_id__to__ccr_id foreign key (cardiac_catheterization_report_id) references cardiac_catheterization_report (id) on update cascade',
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
