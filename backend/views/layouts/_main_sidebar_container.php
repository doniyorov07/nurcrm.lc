<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$route = Yii::$app->controller->route;
$class = 'active';
$menuOpenClass = 'menu-open';

$beginDate = date('01.m.Y');
$endDate = date('t.m.Y');
$isSuperAdmin = Yii::$app->user->can('user');


$sideBarMenus = [

    [
        'label' => Yii::t('app', 'Practice'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/practice']),
        'active' => in_array($route, ['practice/index', 'practice/update', 'practice/create', 'practice/view']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'Lids'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/lids']),
        'active' => in_array($route, ['lids/index', 'lids/update', 'lids/create', 'lids/view']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'Student'),
        'icon' => 'fas fa-users',
        'url' => Url::to(['/student']),
        'active' => in_array($route, ['student/index', 'student/update', 'student/create', 'student/view']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'Teacher'),
        'icon' => 'fas fa-users',
        'url' => Url::to(['/teacher']),
        'active' => in_array($route, ['teacher/index', 'teacher/update', 'teacher/create', 'teacher/view']),
        'isVisible' => true,
        'items' => [],
    ],



    [
        'label' => Yii::t('app', 'Rbac'),
        'icon' => 'fas fa-chalkboard',
        'url' => '#',
        'isVisible' => true,
        'active' => in_array($route, [
            'auth-item/index', 'auth-item/view', 'auth-item/update', 'auth-item/create', 'auth-item/delete',
            'auth-assigment/index', 'auth-assigment/view', 'auth-assigment/update', 'auth-assigment/create', 'auth-assigment/delete',

        ]),
        'items' => [
            [
                'label' => Yii::t('app', 'Item role yaratish'),
                'icon' => 'far fa-dot-circle nav-icon',
                'url' => Url::to(['/auth-item']),
                'isVisible' => true,
                'active' => in_array($route, ['auth-item/index', 'auth-item/view', 'auth-item/update', 'auth-item/create', 'auth-item/delete']),
                'items' => [],
            ],
            [
                'label' => Yii::t('app', 'Userni rolega bog\lash'),
                'icon' => 'far fa-dot-circle nav-icon',
                'url' => Url::to(['/auth-assigment']),
                'isVisible' => true,
                'active' => in_array($route, ['auth-assigment/index', 'auth-assigment/view', 'auth-assigment/update', 'auth-assigment/create', 'auth-assigment/delete']),
                'items' => []
            ],
        ]
    ],

    [
        'label' => Yii::t('app', 'Course vs Group'),
        'icon' => 'fas fa-chalkboard',
        'url' => '#',
        'isVisible' => true,
        'active' => in_array($route, [
           'course/index', 'course/view', 'course/update', 'course/create', 'course/delete',
            'group/index', 'group/view', 'group/update', 'group/create', 'group/delete',
            'teacher-group/index', 'teacher-group/view', 'teacher-group/update', 'teacher-group/create', 'teacher-group/delete',

        ]),
        'items' => [
            [
                'label' => Yii::t('app', 'Course'),
                'icon' => 'far fa-dot-circle nav-icon',
                'url' => Url::to(['/course']),
                'isVisible' => true,
                'active' => in_array($route, ['course/index', 'course/view', 'course/update', 'course/create', 'course/delete']),
                'items' => [],
            ],
            [
                'label' => Yii::t('app', 'Group'),
                'icon' => 'far fa-dot-circle nav-icon',
                'url' => Url::to(['/group']),
                'isVisible' => true,
                'active' => in_array($route, ['group/index', 'group/view', 'group/update', 'group/create', 'group/delete']),
                'items' => []
            ],
            [
                'label' => Yii::t('app', 'Teacher Group'),
                'icon' => 'far fa-dot-circle nav-icon',
                'url' => Url::to(['/teacher-group']),
                'isVisible' => true,
                'active' => in_array($route, ['teacher-group/index', 'teacher-group/view', 'teacher-group/update', 'teacher-group/create', 'teacher-group/delete']),
                'items' => []
            ],
        ]
    ],

    [
        'label' => Yii::t('app', 'Data'),
        'icon' => 'fas fa-database',
        'url' => Url::to(['/data']),
        'active' => in_array($route, ['data/index', 'data/view', 'data/update', 'data/create', 'data/delete']),
        'isVisible' => true,
        'items' => [],
    ],

    [
        'label' => Yii::t('app', 'Sozlamalar'),
        'icon' => 'fas fa-cogs',
        'url' => Url::to(['/profile-manager']),
        'active' => in_array($route, ['default/change-login', 'default/change-password', 'client/update', 'client/create', 'client/get-money']),
        'isVisible' => true,
        'items' => [],
    ],

];

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/']) ?>" class="brand-link">
        <img src="<?= Url::base() ?>/adminLte3/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8;width: 29px">
        <span class="brand-text font-weight-light"><?= env('APP_NAME') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= Url::to(['/']) ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php foreach ($sideBarMenus as $sideBarMenu): ?>
                    <?php if ($sideBarMenu['isVisible']): ?>
                        <li class="nav-item <?= $sideBarMenu['active'] ? $menuOpenClass : '' ?>">
                            <a href="<?= $sideBarMenu['url'] ?>"
                               class="nav-link <?= $sideBarMenu['active'] ? $class : '' ?>">
                                <i class="nav-icon <?= $sideBarMenu['icon'] ?>"></i>
                                <p>
                                    <?= $sideBarMenu['label'] ?>
                                    <?php if ($sideBarMenu['items']): ?>
                                        <i class="right fas fa-angle-left"></i>
                                    <?php endif ?>
                                </p>
                            </a>
                            <?php if ($sideBarMenu['items']): ?>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($sideBarMenu['items'] as $item): ?>
                                        <?php if ($item['isVisible']): ?>
                                            <li class="nav-item">
                                                <a href="<?= $item['url'] ?>"
                                                   class="nav-link <?= $item['active'] ? $class : '' ?>">
                                                    <i class="<?= $item['icon'] ?> nav-icon"></i>
                                                    <p><?= $item['label'] ?></p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
