<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'adminLte3/custom.css',
        //'cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css',
        'adminLte3/dist/css/bootstrap-iconpicker.min.css'

    ];
    public $js = [

        'adminLte3/js/adminlte.min.js',
        '//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js',
        'adminLte3/js/demo.js',
        'adminLte3/dist/js/bootstrap-iconpicker.bundle.min.js',
        'adminLte3/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        // 'https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous',
    ];
}
