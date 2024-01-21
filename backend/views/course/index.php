<?php

use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\Course $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;

$color = ['bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-primary', 'bg-secondary'];

?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success', 'id' => 'create-button']) ?>
    </p>

    <?php Pjax::begin(['id' => 'prl-pjax']); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($model as $index => $item) :?>
                    <?php  $colorClass = $color[$index % count($color)]; ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box <?= $colorClass ?>">
                            <div class="inner">
                                <h3>10</h3>
                                <div class="row">
                                    <p class="col-md-11"><?= $item->name ?></p>
                                    <a style="color: white" href="<?=\yii\helpers\Url::to(['course/update', 'id' => $item->id])?>" class="update-edit "><span class="fas fa-edit fa-x"></span></a>
                                </div>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">Barchasi <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <?php Pjax::end(); ?>

</div>
<?php
Modal::begin([
    'id' => 'myModal',
]);

echo "<div id='modalContent'> Content</div>";

Modal::end();
?>
