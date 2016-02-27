<?php

use yii\db\Schema;
use yii\db\Migration;

class m151017_130032_net_work_experience_table extends Migration
{
    public function up()
    {
        $this->createTable('work_experience', [
            'id' => Schema::TYPE_PK,
            'created_at' => Schema::TYPE_INTEGER . ' NULL NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NULL NULL',
            'id_profile' => Schema::TYPE_INTEGER . ' NULL NULL',
            'category' => Schema::TYPE_TEXT . ' NULL NULL',
            'category2' => Schema::TYPE_INTEGER . ' NULL NULL',
            'total_experience' => Schema::TYPE_INTEGER . ' NULL NULL',
            'text' => Schema::TYPE_TEXT . ' NULL NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 1',
            
            
        ]);

    }

    public function down()
    {
        echo "m151017_130032_net_work_experience_table cannot be reverted.\n";

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
