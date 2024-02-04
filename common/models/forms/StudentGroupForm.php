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

        return $model->save();
    }


    public function initCheck(): bool
    {
        $studentGroup = StudentGroup::findOne(['group_id' => $this->group_id, 'lids_id' => $this->lids_id]);

        if ($studentGroup == null) {
            return true;
        }
        $hour = Group::findOne(['group_id' => $this->group_id])->hour;

        $otherGroups = Group::find()
            ->andWhere(['!=', 'id', $this->group_id])
            ->all();

        foreach ($otherGroups as $otherGroup) {
            $otherHour = $otherGroup->hour;

            if ($hour === $otherHour) {
                $otherTeacher = StudentGroup::findOne(['group_id' => $otherGroup->group_id]);

                if ($otherTeacher !== null && ($otherTeacher->lids_id === $this->lids_id || $otherTeacher->lids_id === $studentGroup->lids_id)) {
                    $this->alert("Guruhni o'qituvchiga biriktirib bo'lmaydi.");
                    return false;
                }
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