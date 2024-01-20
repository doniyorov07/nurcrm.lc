<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%group}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 */
class m240120_205137_add_column_to_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%group}}', 'course_id', $this->integer());

        $this->createIndex(
            '{{%idx-group-course_id}}',
            '{{%group}}',
            'course_id'
        );

        $this->addForeignKey(
            '{{%fk-group-course_id}}',
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
        $this->dropForeignKey(
            '{{%fk-group-course_id}}',
            '{{%group}}'
        );

        $this->dropIndex(
            '{{%idx-group-course_id}}',
            '{{%group}}'
        );

        $this->dropColumn('{{%group}}', 'course_id');
    }
}
