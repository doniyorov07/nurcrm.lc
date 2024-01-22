<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lids".
 *
 * @property int $id
 * @property string $username
 * @property string $full_name
 * @property int $number
 * @property int|null $parent_number
 * @property string|null $parent_name
 * @property int|null $gender
 * @property string|null $password
 * @property string|null $telegram
 * @property string|null $location
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Lids extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'lids';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username'], 'unique'],
            [['username', 'full_name', 'number'], 'required'],
            [['number', 'parent_number', 'gender'], 'integer'],
            [['username', 'parent_name', 'telegram', 'location'], 'string', 'max' => 255],
            ['password', 'string', 'min' => 6],
            [['full_name'], 'string', 'max' => 50],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'full_name' => 'Full Name',
            'number' => 'Number',
            'parent_number' => 'Parent Number',
            'parent_name' => 'Parent Name',
            'gender' => 'Gender',
            'password' => 'Password',
            'telegram' => 'Telegram',
            'location' => 'Location',
        ];
    }


}
