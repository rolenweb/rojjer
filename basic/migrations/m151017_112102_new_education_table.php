<?php

use yii\db\Schema;
use yii\db\Migration;

class m151017_112102_new_education_table extends Migration
{
    public function up()
    {
        $this->createTable('education', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_profile' => Schema::TYPE_INTEGER . ' NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 1',
            
            
        ]);

    }

    public function down()
    {
        echo "m151017_112102_new_education_table cannot be reverted.\n";

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
