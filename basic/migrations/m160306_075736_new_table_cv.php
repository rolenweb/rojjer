<?php

use yii\db\Migration;
use yii\db\Schema;

class m160306_075736_new_table_cv extends Migration
{
    public function up()
    {
        $this->createTable('cv', [
            'id' => Schema::TYPE_PK,
            'file_id' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'profile_id' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NULL DEFAULT NULL',
        ]);
    }

    public function down()
    {
        echo "m160306_075736_new_table_cv cannot be reverted.\n";

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
