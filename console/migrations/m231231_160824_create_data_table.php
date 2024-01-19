<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%data}}`.
 */
class m231231_160824_create_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%data}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->unique(),
            'value' => $this->string(),
            'status' => $this->boolean()->defaultValue(true)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%data}}');
    }
}
