<?php

namespace common\models\forms;



use common\models\Group;
use common\models\Payment;
use common\models\User;
use yii\base\Model;

class PaymentForm extends Model
{

    public Payment $model;
    public int|null $lids_id;
    public int|null $group_id;
    public int|null $user_id;
    public int|null $pay_amount;
    public int|null $discount;
    public int|null $pay_type;
    public string|null $comment;
    public string|null $created_at;




    public function __construct(Payment $model, $config = [])
    {
        $this->model = $model;
        $this->lids_id = $model->lids_id;
        $this->group_id = $model->group_id;
        $this->user_id = $model->user_id;
        $this->pay_amount = $model->pay_amount;
        $this->discount = $model->discount;
        $this->pay_type = $model->pay_type;
        $this->comment = $model->comment;
        parent::__construct($config);
    }


    public function save(): bool
    {
        $model = $this->model;
        $model->lids_id = $this->lids_id;
        $model->group_id = $this->group_id;
        $model->user_id = $this->user_id;
        $model->pay_amount = $this->pay_amount;
        $model->discount = $this->discount;
        $model->pay_type = $this->pay_type;
        $model->comment = $this->comment;
        if($model->isNewRecord){
            $model->created_at = date('Y-m-d H:i:s');
        }
        $model->updated_at = date('Y-m-d H:i:s');
        return $model->save(false);
    }





























    public function rules()
    {
        return [
            [['lids_id', 'group_id', 'user_id', 'pay_amount', 'discount', 'pay_type'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'string', 'max' => 255],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Group::class, 'targetAttribute' => ['group_id' => 'id']],
            [['lids_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lids::class, 'targetAttribute' => ['lids_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

}