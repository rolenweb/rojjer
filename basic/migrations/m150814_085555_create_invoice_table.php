<?php

use yii\db\Schema;
use yii\db\Migration;

class m150814_085555_create_invoice_table extends Migration
{
    public function up()
    {
        $this->createTable('invoice', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'due_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 1',
            'amount' => Schema::TYPE_FLOAT . ' NOT NULL',
            'paymentsyst' => Schema::TYPE_INTEGER . ' NOT NULL',
            'comment' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            
            
            
        ]);
    }

    public function down()
    {
        echo "m150814_085555_create_invoice_table cannot be reverted.\n";

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
