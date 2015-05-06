<?php

namespace app\components\custom;

trait MigrationTrait
{
    private function detectTableOptions()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        return $tableOptions;
    }
}
