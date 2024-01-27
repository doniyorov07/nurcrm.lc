<?php

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ModalWidget extends Widget
{

    public $header = "<h5>TITLE</h5>";

    public $footer = '<button type="button" class="btn btn-primary ">Save Changes</button>';

    public $url = '/common/test/modal';

    public $options;

    public $button = [
        'tag' => 'button',
        'class' => 'btn btn-success',
        'label' => 'Open modal',
        'data-bs-toggle' => 'modal',
        'data-bs-target' => '#jk_modal',
    ];

    public string $closeButton = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $rand = rand(1000, 9999);
            $this->options['id'] = 'jk_modal_' . $rand;
            $this->button['id'] = 'jk_button_' . $rand;
            $this->button['data-bs-target'] = '#jk_modal_' . $rand;
        }
    }


    public function initJs()
    {
        $id = $this->button['id'];
        $modalId = $this->options['id'];
        $url = Url::to($this->url);
        $js = <<<JS
           $("#$id").click(function (){
               let modal = $("#$modalId")
               $.ajax({
                url: '$url',
                type: 'get',
                success: function (data) {
                    console.log(data)
                    $("#$modalId .modal-body").html(data);
                    modal.show()
                },
                error: function (data) {
                    console.log(data)
                }
               })
               modal.modal('show');
           })
        JS;

        $this->view->registerJs($js, \yii\web\View::POS_LOAD);
    }

    public function initButtons()
    {
        $this->initJs();
        $button = $this->button;
        $options = array_merge(
            $button['options'] ?? [],
            [
                'class' => [
                    $button['class'] ?? 'btn',
                ],
                'id' => $button['id'] ?? 'modal',
                //'data-bs-toggle' => $button['data-bs-toggle'] ?? 'modal',
                //'data-bs-target' => $button['data-bs-target'],
            ],
        );
        return Html::tag(
            $button['tag'] ?? 'button',
            $button['label'] ?? "<i class='fas fa-edit'></i>",
            $options
        );
    }

    protected function initModalHeader()
    {
        return Html::tag(
            'div',
            $this->header .
            $this->closeButton,
            [
                'class' => 'modal-header',
            ]
        );
    }

    protected function initModalFooter()
    {
        return Html::tag(
            'div',
            $this->footer,
            [
                'class' => 'modal-footer',
            ]
        );
    }

    public function initModalBody()
    {
        return Html::tag(
            'div',
            "BODY",
            [
                'class' => 'modal-body',
            ]
        );
    }


    public function initModalContent()
    {
        return Html::tag(
            'div',
            $this->initModalHeader() .
            $this->initModalBody() .
            $this->initModalFooter(),
            [
                'class' => 'modal-content',
            ]
        );
    }

    public function initModalDialog()
    {
        return Html::tag(
            'div',
            $this->initModalContent(),
            [
                'class' => 'modal-dialog',
            ]
        );
    }

    public function run()
    {

        return
            $this->initButtons() .
            Html::tag(
                'div',
                $this->initModalDialog(),
                [
                    'id' => $this->options['id'],
                    'tabindex' => '-1',
                    'aria-hidden' => true,
                    'class' => 'modal fade',
                ]
            );
    }
}


