<?php

use yii\db\Schema;
use yii\db\Migration;

class m150821_065420_create_orders_table extends Migration
{
    public function up()
    {
        $this->createTable('orders4', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'id_translater' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'username' => Schema::TYPE_STRING . '(255) NOT NULL',
            'lang_from' => Schema::TYPE_INTEGER . ' NOT NULL',
            'lang_to' => Schema::TYPE_INTEGER . ' NOT NULL',
            'srok' => Schema::TYPE_DATE . ' NOT NULL',
            'category' => Schema::TYPE_INTEGER . ' NOT NULL',
            'othercategory' => Schema::TYPE_STRING . ' NULL NULL',
            'title' => Schema::TYPE_STRING . '(255) NOT NULL',
            'text' => Schema::TYPE_TEXT . ' NOT NULL',
            'texthiden' => Schema::TYPE_TEXT . ' NOT NULL',
            'filename' => Schema::TYPE_STRING . '(100) NULL NULL',
            'textready' => Schema::TYPE_TEXT . ' NOT NULL',
            'filenameready' => Schema::TYPE_STRING . '(100) NULL NULL',
            'proofreading' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'country' => Schema::TYPE_INTEGER . ' NULL NULL',
            'country2' => Schema::TYPE_STRING . '(255) NULL NULL',
            'cost' => Schema::TYPE_FLOAT . ' NOT NULL',
            'totalcost' => Schema::TYPE_FLOAT . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'monitor' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'nsymbol' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'nword' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'nstring' => Schema::TYPE_FLOAT . ' NULL DEFAULT 0',
            'type' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'assistant' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'experience' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'level' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'rating' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'country' => Schema::TYPE_INTEGER . ' NULL DEFAULT 0',
            'commentclient' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            'commenttranslate' => Schema::TYPE_STRING . '(1000) NULL DEFAULT NULL',
            
            
            
        ]);

    }

    public function down()
    {
        echo "m150821_065420_create_orders_table cannot be reverted.\n";

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
