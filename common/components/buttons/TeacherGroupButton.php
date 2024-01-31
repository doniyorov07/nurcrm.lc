<?php


namespace common\components\buttons;

use common\widgets\ModalWidget;

class TeacherGroupButton
{

    /**
     * @throws \Throwable
     */
    public static function create(): string
    {
        return ModalWidget::widget([
            'button' => [
                'tag' => 'button',
                'class' => 'btn btn-success',
                'label' => 'Create',
            ],
            'url' => ['teacher-group/create'],
            'footer' => '',
            'header' => "<h2 style='color: black'>" . 'Teacher Group' ."</h2>"
        ]);
    }

    /**
     * @throws \Throwable
     */
    public static function update(int $id): string
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
            'url' => ['teacher-group/update', 'id' => $id],
            'footer' => '',
            'header' => "<h2 style='color: black'>" . 'Teacher Group' ."</h2>"
        ]);
    }


}