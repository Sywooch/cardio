<?php

use yii\db\Schema;

class m140611_182450_rename_pci_to_ht_report extends \yii\db\Migration
{
    public function up()
    {
        $this->renameTable('{{pci}}', '{{ht_report}}');
    }

    public function down()
    {
        $this->renameTable('{{ht_report}}', '{{pci}}');
    }
}
