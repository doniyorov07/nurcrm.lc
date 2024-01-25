<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 */
class m240125_142657_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer(),
            'group_name' => $this->string(),
            'days' => $this->string()->notNull(),
            'hour' => $this->time()->notNull(),
            'lesson_start' => $this->date()->notNull(),
            'lesson_end' => $this->date()->notNull(),
            'price' => $this->integer()->notNull(),
            'status' => $this->boolean()->notNull(),
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-group-course_id}}',
            '{{%group}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-group-course_id}}',
            '{{%group}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-group-course_id}}',
            '{{%group}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-group-course_id}}',
            '{{%group}}'
        );

        $this->dropTable('{{%group}}');
    }
}
