<?php

use yii\db\Schema;
use yii\db\Migration;

class m150814_072915_create_balance_table extends Migration
{
    public function up()
    {
         $this->createTable('balance', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'balance' => Schema::TYPE_FLOAT . ' NULL DEFAULT 0',
            'hold' => Schema::TYPE_FLOAT . ' NULL DEFAULT 0',
            
            
        ]); 
    }

    public function down()
    {
        echo "m150814_072915_create_balance_table cannot be reverted.\n";

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
