<?php

use yii\db\Schema;
use yii\db\Migration;

class m150825_082453_new_orderready_table extends Migration
{
    public function up()
    {
        $this->createTable('orderready', [
            'id' => Schema::TYPE_PK,
            'id_order' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_translater' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'filename' => Schema::TYPE_STRING . '(100) NULL NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'comment' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            
            
            
        ]);

    }

    public function down()
    {
        echo "m150825_082453_new_orderready_table cannot be reverted.\n";

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
