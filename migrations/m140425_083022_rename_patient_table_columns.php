<?php

use yii\db\Schema;

class m140425_083022_rename_patient_table_columns extends \yii\db\Migration
{
    private $oldTable = '{{patients}}';

    private $table = '{{patient}}';

    public function up()
    {
        $this->dropTable($this->oldTable);

        $this->createTable(
            $this->table,
            [
                'id int(11) not null auto_increment',
                'pid varchar(12) not null',
                'name varchar(1024) not null',
                'bsn varchar(2048) default null',
                'sex varchar(255) not null',
                'birth_date datetime',
                'address varchar(2048) default null',
                'zip_code varchar(12) default null',
                'city varchar(1024) default null',
                'country varchar(12) default null',
                'phone varchar(255) default null',
                'maiden_name varchar(255) default null',
                'died tinyint(1) default null',
                'died_at datetime',
                'general_practitioner_id int(11) default null',
                'insurance varchar(512) default null',
                'fds_polis_nr varchar(255) default null',
                'primary key(id)',
            ]
        );

    }

    public function down()
    {
        $this->dropTable($this->table);

        $this->createTable(
            $this->oldTable,
            [
                'id int(11) not null auto_increment',
                'patienten_nr varchar(12) not null',
                'naam varchar(1024) not null',
                'bsn_number varchar(2048) default null',
                'geslacht varchar(255) not null',
                'geboortedatum datetime',
                'straat varchar(2048) default null',
                'postcode varchar(12) default null',
                'plaats varchar(1024) default null',
                'land varchar(12) default null',
                'telefoon varchar(255) default null',
                'meisjesnaam varchar(255) default null',
                'is_overleden tinyint(1) default null',
                'overleden_op datetime',
                'huisarts varchar(1024) default null',
                'verzekering varchar(512) default null',
                'fds_polis_nr varchar(255) default null',
                'primary key(id)',
            ]
        );
    }
}
