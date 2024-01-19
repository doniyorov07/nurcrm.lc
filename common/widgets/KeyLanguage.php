<?php

namespace common\widgets;

namespace common\widgets;

use common\enums\StatusEnums;
use common\models\Data;
use yii\base\Widget;
use yii\helpers\Html;

class KeyLanguage extends Widget
{
    public $key;

    public function run()
    {
        if ($this->key) {
            $valueModel = Data::find()->where(['key' => $this->key, 'status' => StatusEnums::ACTIVE])->one();
            if ($valueModel) {
                if (!empty($valueModel->value)) {
                    $output = Html::encode($valueModel->value);
                    return $output;
                }
            }
        }
        return '';
    }
}


