<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $full_name
 * @property int|null $number
 * @property string|null $birth_day
 * @property int|null $gender
 * @property string|null $password
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'teacher';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'status'], 'integer'],
            [['birth_day'], 'safe'],
            [['full_name'], 'string', 'max' => 50],
            [['number'], 'string', 'max' => 30],
            [['password', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'number' => 'Number',
            'birth_day' => 'Birth Day',
            'gender' => 'Gender',
            'password' => 'Password',
            'status' => 'Status',
        ];
    }

    /**
     * @throws Exception
     */
    public function setPassword(?string $password): void
    {
        if ($password !== null) {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
        } else {
            $this->password = null;
        }
    }
}
