<?php


namespace common\components\buttons;

use common\widgets\ModalWidget;

class TeacherFormButton
{

    public static function create(): string
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => 'Create',
            ],
            'url' => ['teacher/create'],
            'footer' => '',
            'header' => "<h2>" . 'Course' ."</h2>"
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
            'url' => ['teacher/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2 style='color: black'>" . 'Course' ."</h2>"
        ]);
    }


}