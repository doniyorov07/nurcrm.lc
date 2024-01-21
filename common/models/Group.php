<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "group".
 *
 * @property int $id
 * @property string|null $course_id
 * @property string|null $group_name
 * @property int $days
 * @property string $hour
 * @property string $lesson_start
 * @property string $lesson_end
 * @property int $status
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['days', 'hour', 'lesson_start', 'lesson_end', 'status'], 'required'],
            [['days', 'status'], 'integer'],
            [['hour', 'lesson_start', 'lesson_end'], 'safe'],
            [['group_name'], 'string', 'max' => 255],
            [['course_id'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course Name',
            'group_name' => 'Group Name',
            'days' => 'Days',
            'hour' => 'Hour',
            'lesson_start' => 'Lesson Start',
            'lesson_end' => 'Lesson End',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\GroupQuery the active query used by this AR class.
     */
    public static function find(): query\GroupQuery
    {
        return new \common\models\query\GroupQuery(get_called_class());
    }

    public function getCourse(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }
}
