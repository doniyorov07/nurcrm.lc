<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%group}}`.
 */
class m240120_205730_drop_column_from_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%group}}', 'course_name');
    }

    /**
     * {@inheritdoc}
     */

}
