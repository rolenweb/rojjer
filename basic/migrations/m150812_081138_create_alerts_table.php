<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_081138_create_alerts_table extends Migration
{
    public function up()
    {
        $this->createTable('alerts', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'id_order' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'type' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'comment' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
        ]);
    }

    public function down()
    {
        echo "m150812_081138_create_alerts_table cannot be reverted.\n";

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
