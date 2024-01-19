<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property int|null $status
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['key', 'value'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Text',
            'status' => 'Status',
        ];
    }
}
