<?php

use yii\db\Schema;
use yii\db\Migration;

class m140801_115904_create_report_table extends Migration
{
    private $table = '{{report}}';

    public function up()
    {
        $this->createTable($this->table, [
            'id' => Schema::TYPE_PK,
            'report' => Schema::TYPE_TEXT,
            'type' => Schema::TYPE_STRING,
            'patient_id' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable($this->table);
    }
}
