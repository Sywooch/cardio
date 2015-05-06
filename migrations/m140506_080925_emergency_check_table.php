<?php

use yii\db\Schema;

class m140506_080925_emergency_check_table extends \yii\db\Migration
{
    private $table = '{{emergency_check}}';

    public function up()
    {
        $this->createTable(
            $this->table,
            [
                'id int(11) not null auto_increment',
                'pid varchar(12) not null',
                'date datetime',
                'type_of_treatment varchar(255)',
                'emergency_id varchar(255)',
                'filename varchar(512)',
                'mtime varchar(255)',
                'arrival_date datetime',
                'departure_date datetime',
                'treating_speciality varchar(255)',
                'treating_speciality_disabled tinyint(1)',
                'emergency_status varchar(512)',
                'primary key(id)',
            ]
        );

    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
