<?php

use yii\db\Schema;

class m140427_110307_create_table_cardiac_catheterization_report extends \yii\db\Migration
{
    private $table = '{{cardiac_catheterization_report}}';

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
                'cxp tinyint(3)',
                'cxm tinyint(3)',
                'mo tinyint(3)',
                'cxd tinyint(3)',
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
                'graft2 tinyint(3)',
                'lima tinyint(3)',
                'rima tinyint(3)',
                'cag_details text',
                'proposal text',
                'primary key(id)',
                'key patient_id__to__patient_id (patient_id)',
                'constraint patient_id__to__patient_id foreign key (patient_id) references patient (id) on update cascade',
                'key create_by__to__users_id (created_by)',
                'constraint created_by__to__users_id foreign key (created_by) references users (id) on update cascade',
                'key updated_by__to__users_id (updated_by)',
                'constraint updated_by__to__users_id foreign key (updated_by) references users (id) on update cascade',
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
