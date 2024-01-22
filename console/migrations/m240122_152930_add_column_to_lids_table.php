<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%lids}}`.
 */
class m240122_152930_add_column_to_lids_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%lids}}', 'status', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%lids}}', 'status');
    }
}
