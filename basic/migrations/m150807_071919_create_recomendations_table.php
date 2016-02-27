<?php

use yii\db\Schema;
use yii\db\Migration;

class m150807_071919_create_recomendations_table extends Migration
{
    public function up()
    {
         $this->createTable('recomendations', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . '(255) NOT NULL',
            'namefile' => Schema::TYPE_STRING . '(100) NOT NULL',
            
            
        ]); 
    }

    public function down()
    {
        echo "m150807_071919_create_recomendations_table cannot be reverted.\n";

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
