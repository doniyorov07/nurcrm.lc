<?php

namespace common\models\forms;

use common\models\Group;
use common\models\Lids;
use common\models\StudentGroup;
use yii\base\Model;

class StudentGroupForm extends Model
{

    public StudentGroup $model;
    public ?int $lids_id;
    public ?int $group_id;
    public ?string $group_created_at;

    public function __construct(StudentGroup $model, $config = [])
    {
        $this->model = $model;
        $this->lids_id = $model->lids_id;
        $this->group_id = $model->group_id;
        $this->group_created_at = $model->group_created_at;
        parent::__construct($config);
    }


    public function save(): bool
    {
        $model = $this->model;
        $model->lids_id = $this->lids_id;
        $model->group_id = $this->group_id;
        $model->group_created_at = $this->group_created_at;
        if (!$this->initCheck()) {
            return false;
        }
        return $model->save();
    }

    public function initCheck(): bool
    {
        $studentGroup = StudentGroup::find()
            ->where(['group_id' => $this->group_id])
            ->all();

        foreach ($studentGroup as $item) {
            if ($item->lids_id === $this->lids_id){
                return false;
            }
        }

        return true;
    }








    public function rules()
    {
        return [
            [['lids_id', 'group_id'], 'integer'],
            [['group_created_at'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['lids_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lids::class, 'targetAttribute' => ['lids_id' => 'id']],
        ];
    }



}