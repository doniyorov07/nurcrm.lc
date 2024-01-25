<?php

namespace common\models\forms;

use common\models\Group;
use yii\base\Model;
use yii\helpers\Json;

class GroupForm extends Model
{
    public Group $model;
    public ?string $group_name;
    public ?string $hour;
    public ?array $days;
    public ?string $lesson_start;
    public ?string $lesson_end;
    public ?bool $status;
    public ?int $course_id;
    public ?int $price;

    public function rules()
    {
        return [
            [['price', 'days', 'hour', 'lesson_start', 'lesson_end', 'status'], 'required'],
            [['status', 'price'], 'integer'],
            [['hour', 'lesson_start', 'lesson_end', 'days'], 'safe'],
            [['group_name'], 'string', 'max' => 255],
            [['course_id'], 'integer']
        ];
    }

    public function __construct(Group $model, $config = [])
    {
        $this->model = $model;
        $this->group_name = $model->group_name;
        $this->days = $model->days ? Json::decode($model->days) : null;
        $this->hour = $model->hour;
        $this->lesson_start = $model->lesson_start;
        $this->lesson_end = $model->lesson_end;
        $this->status = $model->status;
        $this->course_id = $model->course_id;
        $this->price = $model->price;
        parent::__construct($config);
    }

    public function save(): bool
    {
        $model = $this->model;
        $model->group_name = $this->group_name;
        $model->days = $this->days ? Json::encode($this->days) : null;
        $model->hour = $this->hour;
        $model->lesson_start = $this->lesson_start;
        $model->lesson_end = $this->lesson_end;
        $model->status = $this->status;
        $model->course_id = $this->course_id;
        $model->price = $this->price;
        return $model->save(false);
    }
}
