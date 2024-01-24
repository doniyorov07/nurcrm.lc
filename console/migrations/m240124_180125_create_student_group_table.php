<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student_group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%lids}}`
 * - `{{%group}}`
 */
class m240124_180125_create_student_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student_group}}', [
            'id' => $this->primaryKey(),
            'lids_id' => $this->integer(),
            'group_id' => $this->integer(),
            'group_created_at' => $this->date(),
        ]);

        // creates index for column `lids_id`
        $this->createIndex(
            '{{%idx-student_group-lids_id}}',
            '{{%student_group}}',
            'lids_id'
        );

        $this->addForeignKey(
            '{{%fk-student_group-lids_id}}',
            '{{%student_group}}',
            'lids_id',
            '{{%lids}}',
            'id',
        );

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-student_group-group_id}}',
            '{{%student_group}}',
            'group_id'
        );

        // add foreign key for table `{{%group}}`
        $this->addForeignKey(
            '{{%fk-student_group-group_id}}',
            '{{%student_group}}',
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
        // drops foreign key for table `{{%lids}}`
        $this->dropForeignKey(
            '{{%fk-student_group-lids_id}}',
            '{{%student_group}}'
        );

        // drops index for column `lids_id`
        $this->dropIndex(
            '{{%idx-student_group-lids_id}}',
            '{{%student_group}}'
        );

        // drops foreign key for table `{{%group}}`
        $this->dropForeignKey(
            '{{%fk-student_group-group_id}}',
            '{{%student_group}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-student_group-group_id}}',
            '{{%student_group}}'
        );

        $this->dropTable('{{%student_group}}');
    }
}
