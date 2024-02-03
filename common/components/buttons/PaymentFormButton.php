<?php

namespace common\components\buttons;

use common\widgets\ModalWidget;

class PaymentFormButton
{
    public static function create(): string
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-outline-success py-0',
                'label' => '<i class=" fas  fa-money-bill-alt mr-1" style="color: #68e458;"></i>To\'lov',
            ],
            'url' => ['student/create'],
            'footer' => '',
            'header' => "<h2>" . 'Student Group' ."</h2>"
        ]);
    }

    /**
     * @throws \Throwable
     */
    public static function update(int $id)
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'span',
                'class' => '',
                'options' => [
                    'style' => [
                        'cursor' => 'pointer',
                        'color' => 'blue',
                    ]
                ]
            ],
            'url' => ['group/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2>" . 'Student Group' ."</h2>"
        ]);
    }


}