<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%teacher_group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%teacher}}`
 * - `{{%group}}`
 */
class m240130_135640_create_teacher_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%teacher_group}}', [
            'id' => $this->primaryKey(),
            'teacher_id' => $this->integer(),
            'group_id' => $this->integer(),
            'created_teacher_at' => $this->datetime(),
            'updated_teacher_at' => $this->datetime(),
        ]);

        // creates index for column `teacher_id`
        $this->createIndex(
            '{{%idx-teacher_group-teacher_id}}',
            '{{%teacher_group}}',
            'teacher_id'
        );

        // add foreign key for table `{{%teacher}}`
        $this->addForeignKey(
            '{{%fk-teacher_group-teacher_id}}',
            '{{%teacher_group}}',
            'teacher_id',
            '{{%teacher}}',
            'id',
        );

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-teacher_group-group_id}}',
            '{{%teacher_group}}',
            'group_id'
        );

        // add foreign key for table `{{%group}}`
        $this->addForeignKey(
            '{{%fk-teacher_group-group_id}}',
            '{{%teacher_group}}',
            'group_id',
            '{{%group}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%teacher}}`
        $this->dropForeignKey(
            '{{%fk-teacher_group-teacher_id}}',
            '{{%teacher_group}}'
        );

        // drops index for column `teacher_id`
        $this->dropIndex(
            '{{%idx-teacher_group-teacher_id}}',
            '{{%teacher_group}}'
        );

        // drops foreign key for table `{{%group}}`
        $this->dropForeignKey(
            '{{%fk-teacher_group-group_id}}',
            '{{%teacher_group}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-teacher_group-group_id}}',
            '{{%teacher_group}}'
        );

        $this->dropTable('{{%teacher_group}}');
    }
}
