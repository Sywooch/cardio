<?php

use yii\db\Schema;

class m140623_210932_rename_artery_to_pci_report_artery extends \yii\db\Migration
{
    private $oldName = '{{artery}}';
    private $newName = '{{pci_report_artery}}';

    public function up()
    {
        $this->renameTable($this->oldName, $this->newName);
    }

    public function down()
    {
        $this->renameTable($this->newName, $this->oldName);
    }
}
