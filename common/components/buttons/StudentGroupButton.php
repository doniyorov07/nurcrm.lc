<?php


namespace common\components\buttons;

use common\widgets\ModalWidget;

class StudentGroupButton
{

    public static function create(): string
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-outline-primary rounded-pill py-0 open-btn',
                'label' => '<i class=" fas fa-inbox mr-1" style="color: #58ace4;"></i>Guruhga qo\'shish',
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
            'url' => ['student/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2>" . 'Student Group' ."</h2>"
        ]);
    }


}