<?php

use yii\db\Schema;

class m140425_085047_general_practitioner_table extends \yii\db\Migration
{
    private $table = '{{general_practitioner}}';

    public function up()
    {
        $this->createTable(
            $this->table,
            [
                'id int(11) not null auto_increment',
                'name varchar(1024) not null',
                'address varchar(1024) not null',
                'zip_code varchar(12) default null',
                'city varchar(255) default null',
                'code varchar(12) not null comment "Code of huisart to parse from external resource"',
                'primary key(id)',
                'key code (code)',
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
