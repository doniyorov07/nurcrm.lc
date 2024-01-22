<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lids}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m240122_171634_add_column_to_lids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lids}}', 'user_id', $this->integer());

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-lids-user_id}}',
            '{{%lids}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-lids-user_id}}',
            '{{%lids}}',
            'user_id',
            '{{%user}}',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-lids-user_id}}',
            '{{%lids}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-lids-user_id}}',
            '{{%lids}}'
        );

        $this->dropColumn('{{%lids}}', 'user_id');
    }
}
