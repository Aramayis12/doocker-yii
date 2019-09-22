<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap/css/bootstrap.min.css',
        'css/font-awesome/css/font-awesome.min.css',
        'css/ionicons.min.css',
        'css/AdminLTE.min.css',
        'css/_all-skins.min.css',
        'css/morris.css',
        'css/jquery-jvectormap.css',
        'css/bootstrap-datepicker.min.css',
        'css/daterangepicker.css',
        'css/bootstrap3-wysihtml5.min.css',

        'css/site.css',
    ];
    public $js = [
        // 'js/jquery.min.js',
        'https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js',
        'js/jquery-ui.min.js',
        'js/default.js',
        'css/bootstrap/js/bootstrap.min.js',
        'js/raphael.min.js',
        'js/morris.min.js',
        'js/jquery.sparkline.min.js',
        'js/jquery-jvectormap-1.2.2.min.js',
        'js/jquery-jvectormap-world-mill-en.js',
        'js/jquery.knob.min.js',
        'js/moment.min.js',
        'js/daterangepicker.js',
        'js/bootstrap-datepicker.min.js',
        'js/bootstrap3-wysihtml5.all.min.js',
        'js/jquery.slimscroll.min.js',
        'js/fastclick.js',
        'js/adminlte.min.js',
        'js/dashboard.js',
        'js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
