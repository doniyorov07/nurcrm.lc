<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m240123_131613_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'course_name' => $this->string(),
            'group_name' => $this->string(),
            'days' => $this->boolean()->notNull(),
            'hour' => $this->time()->notNull(),
            'lesson_start' => $this->date()->notNull(),
            'lesson_end' => $this->date()->notNull(),
            'status' => $this->boolean()->notNull(),
        ]);

        $this->addColumn('{{%group}}', 'course_id', $this->integer());

        $this->addForeignKey(
            'fk-group-course_id',
            '{{%group}}',
            'course_id',
            '{{%course}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group}}');
    }
}
