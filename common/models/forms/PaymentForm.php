<?php

namespace common\models\forms;



use common\models\Group;
use common\models\Lids;
use common\models\Payment;
use common\models\User;
use yii\base\Model;

class PaymentForm extends Model
{

    public Payment $payment;
    public int|null $lids_id;
    public int|null $group_id;
    public int|null $user_id;
    public int|null $pay_amount;
    public int|null $discount;
    public int|null $pay_type;
    public string|null $comment;
    public string|null $created_at;




    public function __construct(Payment $payment, $config = [])
    {
        $this->payment = $payment;
        $this->lids_id = $payment->lids_id;
        $this->group_id = $payment->group_id;
        $this->user_id = $payment->user_id;
        $this->pay_amount = $payment->pay_amount;
        $this->discount = $payment->discount;
        $this->pay_type = $payment->pay_type;
        $this->comment = $payment->comment;
        parent::__construct($config);
    }


    public function save(): bool
    {
        $payment = $this->payment;
        $payment->lids_id = $this->lids_id;
        $payment->group_id = $this->group_id;
        $payment->user_id = \Yii::$app->user->id;
        $payment->pay_amount = $this->pay_amount;
        $payment->discount = $this->discount;
        $payment->pay_type = $this->pay_type;
        $payment->comment = $this->comment;
        if($payment->isNewRecord){
            $payment->created_at = date('Y-m-d H:i:s');
        }
        $payment->updated_at = date('Y-m-d H:i:s');
        return $payment->save(false);
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