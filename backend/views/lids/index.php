<?php

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

    <p>
        <?= Html::a('Create Lids', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                'urlCreator' => function ($action, Lids $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>




    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Kanban Board</h1>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kanban Board</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <div class="row">
        <div class="col-md-4">
            <div class="card card-row card-default">
                <div class="card-header bg-warning">
                    <h3 class="card-title">
                        In Progress
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Update Readme</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#2</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Aenean commodo ligula eget dolor. Aenean massa.
                                Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card card-row card-primary ">
                <div class="card-header">
                    <h3 class="card-title">
                        To Do
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Create first milestone</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#5</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card card-row card-default">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        In Progress
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card card-light card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Update Readme</h5>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-link">#2</a>
                                <a href="#" class="btn btn-tool">
                                    <i class="fas fa-pen"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                Aenean commodo ligula eget dolor. Aenean massa.
                                Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>






<script>
    $(document).ready(function () {
        $('.toggle-card').click(function () {
            $('.card-body').toggle();
        });

        $('.btn-link').click(function (e) {
            e.preventDefault();
        });
    });
</script>




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

