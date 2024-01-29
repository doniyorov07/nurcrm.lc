<?php

namespace common\models;

use common\enums\LidsEnums;
use Yii;

/**
 * This is the model class for table "student_group".
 *
 * @property int $id
 * @property int|null $lids_id
 * @property int|null $group_id
 * @property string|null $group_created_at
 *
 * @property Group $group
 * @property Lids $lids
 */
class StudentGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lids_id', 'group_id'], 'integer'],
            [['group_created_at'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['lids_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lids::class, 'targetAttribute' => ['lids_id' => 'id']],
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
            'group_created_at' => 'Group Created At',
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


}
