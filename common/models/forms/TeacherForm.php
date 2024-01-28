<?php

namespace common\models\forms;


use common\models\Teacher;
use yii\base\Exception;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

class TeacherForm extends Model
{

    public  Teacher $model;

    public ?string $full_name;
    public ?int $number;
    public ?string $birth_day;
    public ?int $gender;
    public ?string $password;
    public ?string $created_at;
    public ?string $updated_at;
    public ?int $status;




    public function __construct(Teacher $model, $config = [])
    {
        $this->model = $model;
        $this->full_name = $model->full_name;
        $this->number = $model->number;
        $this->birth_day = $model->birth_day;
        $this->gender = $model->gender;
        $this->password = $model->password;
        $this->status = $model->status;
        parent::__construct($config);
    }

    /**
     * @throws Exception
     */
    public function save(): bool
    {
        $model = $this->model;
        $model->full_name = $this->full_name;
        $model->number = $this->number;
        $model->birth_day = $this->birth_day;
        $model->gender = $this->gender;
        if ($this->password !== null) {
            $model->setPassword($this->password);
        }
        if($model->isNewRecord){
            $model->created_at = date('Y-m-d H:i:s');
        }
        $model->updated_at = date('Y-m-d H:i:s');
        $model->status = $this->status;
        return $model->save(false);

    }



    public function rules(): array
    {
        return [
            [['number', 'gender', 'status'], 'integer'],
            [['birth_day'], 'safe'],
            [['full_name'], 'string', 'max' => 50],
            [['password', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

}