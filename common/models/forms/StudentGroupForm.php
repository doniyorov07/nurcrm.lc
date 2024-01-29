<?php

namespace common\models\forms;

use common\models\Group;
use common\models\Lids;
use common\models\StudentGroup;
use common\models\Teacher;
use yii\base\Model;

class StudentGroupForm extends Model
{

    public StudentGroup $model;
    public  $lids_id;
    public  $group_id;
    public  $group_created_at;


    public function __construct(StudentGroup $model, $config = [])
    {
        $this->model = $model;
        $this->lids_id = $model->lids_id;
        $this->group_id = $model->group_id;
        $this->group_created_at = $model->group_created_at;
        parent::__construct($config);
    }


    private bool $isAssociationExists = false;

    public function initStdGroup()
    {
        $model = StudentGroup::find()->all();

        foreach ($model as $studentgroup) {
            if ($this->model->lids_id == $studentgroup->lids_id && $this->model->group_id == $studentgroup->group_id) {
                $this->isAssociationExists = true;
                break;
            }
        }
    }


    public function save(): bool
    {
        $model = $this->model;
        if ($this->isAssociationExists) {
            $this->addError('lids_id', 'This student is already assigned to the selected group.');
            return false;
        }
        $model->lids_id = $this->lids_id;
        $model->group_id = $this->group_id;
        $model->group_created_at = $this->group_created_at;
        return $model->save(false);

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

    public function isAssociationExists(): bool
    {
        return $this->isAssociationExists;
    }


}