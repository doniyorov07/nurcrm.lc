<?php

use common\models\components\CourseFormButton;
use common\models\Lids;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var common\models\search\LidsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lids-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= CourseFormButton::create() ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model'  => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'username',
            'full_name',
            'number',
//            [
//                    'attribute' => 'teacher',
//                    'value' => static  function($model)
//                    {
//                        return $model->id;
//                    }
//            ],
            //'parent_number',
            //'parent_name',
            //'gender',
            //'password',
            //'telegram',
            //'location',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="fas fa-eye"></span>',
                            ['student/view', 'id' => $model->id],
                        );
                    },
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        return ['student/view', 'id' => $model->id];
                    } elseif ($action === 'delete') {
                        return ['student/delete', 'id' => $model->id];
                    }
                },
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>







<style>
    .offcanvas-menu{
        top: 50px;
        right: 0;
        z-index: 5;
        transform: translateX(100%);
        transition: all .4s ease;
    }
    .offcanvas-menu.active{
        transform: translateX(0);
    }
    .card-body{
        background-color: #f9fafa;
    }

    #telefon, #parenttelefone{
        outline: 0;
    }
    #telefon:valid{
        border-color: green;

    }
    #telefon:focus:invalid{
        border-color: red;
    }
</style>

