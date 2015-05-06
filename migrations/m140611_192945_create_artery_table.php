<?php

use yii\db\Schema;

class m140611_192945_create_artery_table extends \yii\db\Migration
{
    private $table = '{{artery}}';

    public function up()
    {
        $this->createTable(
            $this->table,
            [
                'id int(11) not null auto_increment',
                'pci_report_id int(11) not null',
                'artery varchar(24) not null',
                'is_ffr tinyint(1) not null default "0"',
                'ffr1 varchar(128) default null',
                'ffr2 varchar(128) default null',
                'ffr3 varchar(128) default null',
                'is_adenosine tinyint(1) default "0"',
                'ic_iv varchar(12) not null',
                'small_description text default null',
                'primary key(id)',
                'key artery__pci_report_id__to__pci_report__id (pci_report_id)',
                'constraint artery__pci_report_id__to__pci_report__id foreign key (pci_report_id) references pci_report (id) on update cascade',
            ]
        );
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
