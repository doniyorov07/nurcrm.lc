<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lids}}`.
 */
class m240122_153420_add_column_to_lids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lids}}', 'created_at', $this->date('Y-m-d H:i:s'));
        $this->addColumn('{{%lids}}', 'updated_at', $this->date('Y-m-d H:i:s'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lids}}', 'status');
    }
}
