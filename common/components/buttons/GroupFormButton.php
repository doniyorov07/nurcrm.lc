<?php

namespace common\components\buttons;

use common\widgets\ModalWidget;

class GroupFormButton
{
    public static function create(): string
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => 'Guruhga qo\'shish',
            ],
            'url' => ['group/create'],
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