<?php

use yii\db\Schema;
use yii\db\Migration;

class m150923_083025_new_onlinemonitor_table extends Migration
{
    public function up()
    {
        $this->createTable('onlinemonitor', [
            'id' => Schema::TYPE_PK,
            'id_order' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_translater' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'done' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'filename' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            
            
            
        ]);

    }

    public function down()
    {
        echo "m150923_083025_new_onlinemonitor_table cannot be reverted.\n";

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
