<?php

use yii\db\Schema;
use yii\db\Migration;

class m160110_085539_billing_address_table extends Migration
{
    public function up()
    {
        $this->createTable('billing_address', [
            'id' => Schema::TYPE_PK,
            'id_profile' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            
            
            
        ]); 
    }

    public function down()
    {
        echo "m160110_085539_billing_address_table cannot be reverted.\n";

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
