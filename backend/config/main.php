<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'uz-UZ',
    'modules' => [
        'profile-manager' => [
            'class' => 'backend\modules\profilemanager\Module'
        ],
        'translate-manager' => [
            'class' => 'wokster\translationmanager\TranslationManager',
            'languages' => ['uz','ru'],
        ],
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/hail812/yii2-adminlte3/src/views'
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => '/admin',
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '@web/adminLte3',
                    'js' => [
                        'js/jquery.min.js'
                    ],
                ],
                'yii\bootstrap4\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '@web/adminLte3',
                    'css' => [
                        'css/fontawesome-free/css/all.min.css',
                        'css/adminlte.min.css',
                    ],
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => '@web/adminLte3',
                    'js' => [
                        'js/bootstrap.bundle.min.js',
                    ],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
            'authTimeout' => 3600,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'baseUrl' => '/admin',
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
