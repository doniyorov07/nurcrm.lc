<?php

namespace common\models\forms;


use common\models\Lids;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\base\Security;


class LidsForm extends Model
{

    public Lids $model;
    public string|null $username;
    public string|null $full_name;
    public int|null $number;
    public int|null $parent_number;
    public string|null $parent_name;
    public int|null $gender;
    public string|null $password;
    public string|null $telegram;
    public string|null $location;



    public function __construct(Lids $model, $config = [])
    {
        $this->model = $model;
        $this->username = $model->username;
        $this->full_name = $model->full_name;
        $this->number = $model->number;
        $this->parent_number = $model->parent_number;
        $this->parent_name = $model->parent_name;
        $this->gender = $model->gender;
        $this->password = $model->password;
        $this->telegram = $model->telegram;
        $this->location = $model->location;
        parent::__construct($config);
    }

    /**
     * @throws Exception
     */



    public function save(): bool
    {
        $model = $this->model;
        $model->username = $this->username;
        $model->full_name = $this->full_name;
        $model->number = $this->number;
        $model->parent_number = $this->parent_number;
        $model->parent_name = $this->parent_name;
        $model->gender = $this->gender;
        if ($this->password !== null) {
            $model->setPassword($this->password);
        }
        $model->telegram = $this->telegram;
        $model->location = $this->location;
        if($model->isNewRecord){
            $model->created_at = date('Y-m-d H:i:s');
        }
        $model->updated_at = date('Y-m-d H:i:s');
        return $model->save(false);
    }

    public function rules(): array
    {
        return [
            [['username'], 'unique'],
            [['username', 'full_name', 'number'], 'required'],
            [['number', 'parent_number', 'gender'], 'integer'],
            [['username', 'parent_name', 'password', 'telegram', 'location'], 'string', 'max' => 255],
            [['full_name'], 'string', 'max' => 50],
        ];
    }

}