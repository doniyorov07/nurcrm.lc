<?php

/** @var yii\web\View $this */

use dosamigos\chartjs\ChartJs;

$this->title = 'My Yii Application';
?>
<br>

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
<?php //= ChartJs::widget([
//
//    'type' => 'line',
//    'options' => [
//            'height' => 150,
//            'width' => 600,
//        'resonsive' => true,
//        'interaction' => [
//                'mode' => 'index',
//                'intersect' => false,
//        ],
//    ],
//
//    'plugins' => [
//            'title' => [
//                    'display' => true,
//                    'text' => 'Daromad va Chiqimlar',
//]
//],
//
//
//    'data' => [
//        'labels' => ["Yanvar", "Fevral", "Mart", "Aprel", "May", "Iyun", "Iyul", "Avgust", 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'],
//        'datasets' => [
//            [
//                'label' => "Talabalar soni",
//                 'borderColor' => 'blue',
//                 'backgroundColor' => '',
//                 'data' => $array,
//            ],
//            [
//                'label' => "Talabalar yoshi",
//                'borderColor' => 'red',
//                'backgroundColor' => '',
//                'data' =>  $pay,
//            ],
//        ],
//    ]
//]);
//?>



        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>

