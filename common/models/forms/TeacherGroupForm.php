<?php

namespace common\models\forms;

use common\models\Group;
use common\models\ModelToData;
use common\models\Teacher;
use common\models\TeacherGroup;
use yii\base\Exception;
use yii\base\Model;

class TeacherGroupForm extends Model
{
    public TeacherGroup $model;
    public ?int $teacher_id;
    public ?int $group_id;
    public ?string $created_teacher_at;
    public ?string $updated_teacher_at;

    public function __construct(TeacherGroup $model, $config = [])
    {
        $this->model = $model;
        $this->teacher_id = $model->teacher_id;
        $this->group_id = $model->group_id;
        parent::__construct($config);
    }

    /**
     * @throws Exception
     */
    public function save(): bool
    {
        $model = $this->model;
        $model->teacher_id = $this->teacher_id;
        $model->group_id = $this->group_id;

        if ($model->isNewRecord) {
            $model->created_teacher_at = date('Y-m-d H:i:s');
        }
        $model->updated_teacher_at = date('Y-m-d H:i:s');
        return $model->save(false);
    }



    public function rules()
    {
        return [
            [['teacher_id', 'group_id'], 'integer'],
            [['created_teacher_at', 'updated_teacher_at'], 'safe'],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::class, 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }
}
