<?php

use yii\db\Schema;
use yii\db\Migration;

class m141021_110048_added_first_name_user_table extends Migration
{
    private $table = '{{users}}';
    private $column = 'first_name';
    public function up()
    {
        $this->addColumn($this->table, $this->column, 'VARCHAR(45) AFTER `initials` ');

    }

    public function down()
    {
        echo "m141021_110048_added_first_name_user_table cannot be reverted.\n";

        return false;
    }
}
