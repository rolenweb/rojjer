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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext',
        'http://fonts.googleapis.com/css?family=PT+Serif',
        'bootstrap/css/bootstrap.css',
        'fonts/font-awesome/css/font-awesome.css',
        'fonts/fontello/css/fontello.css',
        'plugins/rs-plugin/css/settings.css',
        'plugins/rs-plugin/css/extralayers.css',
        'plugins/magnific-popup/magnific-popup.css',
        'css/animations.css',
        'css/style.css',
        'css/skins/dark_cyan.css',
        'css/custom.css'
    ];
    public $js = [
        'bootstrap/js/bootstrap.min.js',
        'plugins/modernizr.js',
        'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
        'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'plugins/isotope/isotope.pkgd.min.js',
        'plugins/owl-carousel/owl.carousel.js',
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
        'plugins/jquery.appear.js',
        'plugins/jquery.countTo.js',
        'plugins/jquery.parallax-1.1.3.js',
        'plugins/jquery.validate.js',
        'js/template.js',
        'js/custom.js',
        'js/my.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
