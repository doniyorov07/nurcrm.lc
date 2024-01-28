<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%teacher}}`.
 */
class m240128_174112_add_column_to_teacher_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%teacher}}', 'created_at', $this->string());
        $this->addColumn('{{%teacher}}', 'updated_at', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%teacher}}', 'created_at');
        $this->dropColumn('{{%teacher}}', 'updated_at');
    }
}
