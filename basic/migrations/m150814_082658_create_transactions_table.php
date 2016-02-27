<?php

use yii\db\Schema;
use yii\db\Migration;

class m150814_082658_create_transactions_table extends Migration
{
    public function up()
    {
        $this->createTable('transaction', [
            'id' => Schema::TYPE_PK,
            'id_order' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'id_zaivki' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'id_user_from' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_user_to' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 1',
            'type' => Schema::TYPE_INTEGER . ' NOT NULL',
            'amount' => Schema::TYPE_INTEGER . ' NOT NULL',
            'comment' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            
            
            
        ]); 
    }

    public function down()
    {
        echo "m150814_082658_create_transactions_table cannot be reverted.\n";

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
