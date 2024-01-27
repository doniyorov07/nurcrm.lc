<?php

namespace common\models\forms;


use yii\base\Model;


class CourseForm extends Model
{

    public CourseForm $model;
    public $name;
    public $status;


    public function __construct(CourseForm $model, $config = [])
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