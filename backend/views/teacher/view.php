<?php



/** @var Teacher $model */
/** @var Teacher $groups */

use common\models\Teacher;
use yii\bootstrap4\Modal;
use yii\helpers\Html;


?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">


                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile ">
                        <div class="mt-2 profile-name">
                            <h5 class="font-weight-bold mb-0"><?= $model->full_name?></h5>
                        </div>
                        <div class="mt-2">
                            <p  class="text-muted mb-0">Telefon: <h6 class="font-weight-bold"><?= $model->number?> </h6></p>

                            <p  class="text-muted mb-0">Tug'ilgan kun <span class="font-weight-bold text-dark"></span></p>
                            <h6 class="font-weight-bold"><?= $model->birth_day?> </h6>


                            <p  class="text-muted mb-0">Role <span class="font-weight-bold text-dark"></span></p>
                            <p class="rounded-pill bg-warning d-inline-block px-3">.</p>

                        </div>

                        <div class="mt-3 position-absolute" style="top: 0; right: 10px;">
                            <div class="d-flex flex-column">
                                <div class="pt-2">
                                    <button type="button" class="btn btn-outline-warning rounded-circle px-2 py-1 "><i class=" fas fa-pen" style="color: #FFD43B;"></i></button>
                                </div>
                                <div class="pt-2">

                                    <?= Html::a(
                                        '<i class="far fa-trash-alt" style="color: #ff3b3b;"></i>',
                                        ['teacher/delete', 'id' => $model->id],
                                        [
                                            'class' => 'btn btn-outline-danger rounded-circle px-2 py-1',
                                            'title' => 'Delete',
                                            'data' => [
                                                'confirm' => 'O\'qituvchini o\'chirmoqchimisiz?',
                                                'method' => 'post',
                                            ],
                                        ]
                                    ) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Guruhlar</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="row">
<!--                                    --><?php //foreach ($groups as $group) :?>
<!--                                        <div class="col-md-6">-->
<!--                                            <div class="card card-primary card-outline ">-->
<!--                                                <div class="card-body box-profile p-4">-->
<!--                                                    <div class=" row">-->
<!--                                                        <div class=" col-8">-->
<!--                                                            <p class="rounded-pill bg-secondary d-inline-block px-3 mb-0">--><?php //=$group->group->group_name ?><!--</p>-->
<!--                                                        </div>-->
<!--                                                        <div class=" col-4">-->
<!--                                                            <p  class="text-muted mb-0">--><?php //= $group->group->lesson_start?><!-- --    </p>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class=" row">-->
<!--                                                        <div class=" col-8">-->
<!--                                                            <p  class="text-muted mb-0">--><?php //=$group->group->course->name ?><!--</p>-->
<!--                                                        </div>-->
<!--                                                        <div class=" col-4">-->
<!--                                                            <p  class="text-muted mb-0">--><?php //= $group->group->lesson_end?><!--</p>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class=" row">-->
<!--                                                        <div class=" col-8">-->
<!--                                                            <p  class="text-muted mb-0">Teacher:</p>-->
<!--                                                        </div>-->
<!---->
<!--                                                    </div>-->
<!---->
<!--                                                    <div class="col-12">-->
<!--                                                        <p class="text-muted mb-0">Kunlar: --><?php //= implode(' * ', json_decode($group->group->days)) ?><!-- - --><?php //= $group->group->hour ?><!--</p>-->
<!--                                                    </div>-->
<!---->
<!--                                                    <hr>-->
<!--                                                    <div class="mt-2">-->
<!--                                                        <p  class="text-muted mb-0">Holat: <span class="font-weight-bold text-warning">-->
<!--                                                         --><?php
//                                                         if ($group->lids !== null) {
//                                                             echo $group->lids->getStatusLabel();
//                                                         } else {
//                                                             echo 'Null';
//                                                         }
//                                                         ?>
<!--                                                            </span></p>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-2">-->
<!--                                                        <p  class="text-muted mb-0">Talaba qo'shilgan sana: <span class="font-weight-bold text-dark">-->
<!--                                                                --><?php //= Yii::$app->formatter->asDate($group->lids->created_at, 'php:d-m-Y') ?>
<!--</span></p>-->
<!--                                                    </div>-->
<!--                                                    <div class="mt-2">-->
<!--                                                        <p  class="text-muted mb-0">Bu talaba uchun narx <span class="font-weight-bold text-dark">--><?php //= $group->group->price?><!--</span></p>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                                <!-- /.card-body -->-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    --><?php // endforeach;?>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php
Modal::begin(['id' => 'myModal']);
echo "<div id='modalContent'> Content</div>";
Modal::end();
?>


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