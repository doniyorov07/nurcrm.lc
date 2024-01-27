<?php

use common\components\buttons\CourseFormButton;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\Course $query */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;

$color = ['bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-primary', 'bg-secondary'];

?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= CourseFormButton::create() ?>
    </p>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($query as $index => $item) :?>
                    <?php $colorClass = $color[$index % count($color)]; ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box <?= $colorClass ?>">
                            <div class="inner">
                                <h3>10</h3>
                                <div class="row">
                                    <p class="col-md-11"><?= $item->name ?></p>
                                     <?= CourseFormButton::update($item->id, $item->name); ?>
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


</div>

