<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%student}}`
 * - `{{%group}}`
 * - `{{%user}}`
 */
class m240203_102436_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'lids_id' => $this->integer(),
            'group_id' => $this->integer(),
            'user_id' => $this->integer(),
            'pay_amount' => $this->integer(),
            'discount' => $this->integer(),
            'pay_type' => $this->boolean(),
            'comment' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex(
            '{{%idx-payment-lids_id}}',
            '{{%payment}}',
            'lids_id'
        );

        $this->addForeignKey(
            '{{%fk-payment-lids_id}}',
            '{{%payment}}',
            'lids_id',
            '{{%lids}}',
            'id',
        );

        // creates index for column `group_id`
        $this->createIndex(
            '{{%idx-payment-group_id}}',
            '{{%payment}}',
            'group_id'
        );

        // add foreign key for table `{{%group}}`
        $this->addForeignKey(
            '{{%fk-payment-group_id}}',
            '{{%payment}}',
            'group_id',
            '{{%group}}',
            'id',
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-payment-user_id}}',
            '{{%payment}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-payment-user_id}}',
            '{{%payment}}',
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
        // drops foreign key for table `{{%student}}`
        $this->dropForeignKey(
            '{{%fk-payment-student_id}}',
            '{{%payment}}'
        );

        // drops index for column `student_id`
        $this->dropIndex(
            '{{%idx-payment-student_id}}',
            '{{%payment}}'
        );

        // drops foreign key for table `{{%group}}`
        $this->dropForeignKey(
            '{{%fk-payment-group_id}}',
            '{{%payment}}'
        );

        // drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-payment-group_id}}',
            '{{%payment}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-payment-user_id}}',
            '{{%payment}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-payment-user_id}}',
            '{{%payment}}'
        );

        $this->dropTable('{{%payment}}');
    }
}
