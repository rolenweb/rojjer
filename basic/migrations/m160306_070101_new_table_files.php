<?php

use yii\db\Schema;
use yii\db\Migration;

class m160306_070101_new_table_files extends Migration
{
    public function up()
    {
        $this->createTable('files', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'mimetype' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'size' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'md5' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
        ]);
    }

    public function down()
    {
        echo "m160306_070101_new_table_files cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
