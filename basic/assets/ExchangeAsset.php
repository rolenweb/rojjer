<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ExchangeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'exchange/css/plugins/bootstrap/css/bootstrap.min.css',
        'http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic',
        'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
        'https://fonts.googleapis.com/css?family=Merriweather',
        'exchange/icons/font-awesome/css/font-awesome.min.css',
        'exchange/css/plugins/messenger/messenger.css',
        'exchange/css/plugins/messenger/messenger-theme-flat.css',
        'exchange/css/plugins/daterangepicker/daterangepicker-bs3.css',
        'exchange/css/plugins/morris/morris.css',
        'exchange/css/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        'exchange/css/plugins/datatables/datatables.css',
        'exchange/css/style.css',
        'exchange/css/plugins.css',
        'exchange/css/admin.css'

        


    ];
    public $js = [
        'exchange/js/plugins/bootstrap/bootstrap.min.js',
        'exchange/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'exchange/js/plugins/popupoverlay/jquery.popupoverlay.js',
        'exchange/js/plugins/popupoverlay/defaults.js',
        'exchange/js/plugins/popupoverlay/logout.js',
        'exchange/js/plugins/hisrc/hisrc.js',
        'exchange/js/plugins/messenger/messenger.min.js',
        'exchange/js/plugins/messenger/messenger-theme-flat.js',
        'exchange/js/plugins/daterangepicker/moment.js',
        'exchange/js/plugins/morris/raphael-2.1.0.min.js',
        'exchange/js/plugins/morris/morris.js',
        'exchange/js/plugins/flot/jquery.flot.js',
        'exchange/js/plugins/flot/jquery.flot.resize.js',
        'exchange/js/plugins/sparkline/jquery.sparkline.min.js',
        'exchange/js/plugins/moment/moment.min.js',
        'exchange/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'exchange/js/plugins/jvectormap/maps/jquery-jvectormap-world-mill-en.js',
        'exchange/js/demo/map-demo-data.js',
        'exchange/js/plugins/easypiechart/jquery.easypiechart.min.js',
        'exchange/js/plugins/datatables/jquery.dataTables.js',
        'exchange/js/plugins/datatables/datatables-bs3.js',
        'exchange/js/flex.js',
        


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
