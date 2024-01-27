<?php

namespace common\models\forms;


use common\models\Course;
use yii\base\Model;


class CourseForm extends Model
{

    public Course $model;
    public ?string $name;
    public ?int $status;


    public function __construct(Course $model, $config = [])
    {
        $this->model = $model;
        $this->name = $model->name;
        $this->status = $model->status;
        parent::__construct($config);
    }


    public function save()
    {
        $model = $this->model;
        $model->name = $this->name;
        $model->status = $this->status;
        return $model->save();
    }


    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }



}