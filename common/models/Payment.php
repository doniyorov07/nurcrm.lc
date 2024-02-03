<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $lids_id
 * @property int|null $group_id
 * @property int|null $user_id
 * @property int|null $pay_amount
 * @property int|null $discount
 * @property int|null $pay_type
 * @property string|null $comment
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Group $group
 * @property Lids $lids
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lids_id', 'group_id', 'user_id', 'pay_amount', 'discount', 'pay_type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['lids_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lids::class, 'targetAttribute' => ['lids_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lids_id' => 'Lids ID',
            'group_id' => 'Group ID',
            'user_id' => 'User ID',
            'pay_amount' => 'Pay Amount',
            'discount' => 'Discount',
            'pay_type' => 'Pay Type',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Group]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGroup(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Group::class, ['id' => 'group_id']);
    }

    /**
     * Gets query for [[Lids]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLids(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Lids::class, ['id' => 'lids_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
