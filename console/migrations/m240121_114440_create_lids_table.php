<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lids}}`.
 */
class m240121_114440_create_lids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lids}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->unique()->notNull(),
            'full_name' => $this->string(50)->notNull(),
            'number' => $this->integer(15)->notNull(),
            'parent_number' => $this->integer(15),
            'parent_name' => $this->string(),
            'gender' => $this->boolean(),
            'password' => $this->string(),
            'telegram' => $this->string(),
            'location' => $this->string(),



        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lids}}');
    }
}
