<?php

use yii\db\Schema;

class m140424_103635_create_patients_table extends \yii\db\Migration
{
    private $table = '{{patients}}';

    public function up()
    {
        $this->createTable(
            $this->table,
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

    public function down()
    {
        $this->dropTable(
            $this->table
        );
    }
}
