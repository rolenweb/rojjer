<?php

use yii\db\Schema;
use yii\db\Migration;

class m150810_094137_create_zaivki_table extends Migration
{
    public function up()
    {
         $this->createTable('zaivki', [
            'id' => Schema::TYPE_PK,
            'id_order' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'price' => Schema::TYPE_INTEGER . ' NOT NULL',
            'comment' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            'avatar' => Schema::TYPE_STRING . '(100) NULL DEFAULT NULL',
            'username' => Schema::TYPE_STRING . '(255) NULL DEFAULT NULL',
            
            
        ]); 
    }

    public function down()
    {
        echo "m150810_094137_create_zaivki_table cannot be reverted.\n";

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
