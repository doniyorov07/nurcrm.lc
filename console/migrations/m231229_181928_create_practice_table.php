<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%practice}}`.
 */
class m231229_181928_create_practice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%practice}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text('1000'),
            'date' => $this->date(),
            'type_id' => $this->integer(),
            'video_url' => $this->string(),
            'image' => $this->string(),
            'file' => $this->string(),
            'number' => $this->integer(),
            'views_count' => $this->integer()->defaultValue(1),
            'download_count' => $this->integer(),
            'status' => $this->boolean()->defaultValue(true)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%practice}}');
    }
}
