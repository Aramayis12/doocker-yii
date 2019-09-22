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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        ['css/settings.css', 'media' => 'all'],
        ['http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&#038;ver=4.9.8', 'media' => 'all'],
        ['http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&#038;ver=4.9.8', 'media' => 'all'],
        ['http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&#038;ver=4.9.8', 'media' => 'all'],
        ['css/font-awesome/css/font-awesome.css', 'media' => 'all'],
        ['css/settings2.css', 'media' => 'all'],
        ['css/trx_addons_icons-embedded.css', 'media' => 'all'],
        ['css/swiper.min.css', 'media' => 'all'],
        ['css/magnific-popup.min.css', 'media' => 'all'],
        ['css/trx_addons.css', 'media' => 'all'],
        ['css/trx_addons.animation.css', 'media' => 'all'],
        ['css/woocommerce-layout.css', 'media' => 'all'],
        ['css/woocommerce-smallscreen.css', 'media' => 'only screen and (max-width: 768px)'],
        ['css/woocommerce.css', 'media' => 'all'],
        ['http://fonts.googleapis.com/css?family=Roboto:300,300italic,400,400italic,700,700italic%7CMontserrat:200,300,400,500,600,700,800%7CDosis:200,300,400,500,600,700,800%7CRoboto+Slab:100,300,400,700%7CGlegoo-Bold:200,300,400,500,600,700,800&#038;subset=latin,latin-ext', 'media' => 'all'],
        ['css/fontello-embedded.css', 'media' => 'all'],
        ['css/style.css', 'media' => 'all'],
        ['css/__custom.css', 'media' => 'all'],
        ['css/__colors_default.css', 'media' => 'all'],
        ['css/__colors_dark.css', 'media' => 'all'],
        ['css/mediaelementplayer-legacy.min.css', 'media' => 'all'],
        ['css/wp-mediaelement.min.css', 'media' => 'all'],
        ['css/trx_addons.responsive.css', 'media' => 'all'],
        ['css/responsive.css', 'media' => 'all'],
        ['css/custom.css', 'media' => 'all'],
    ];
    public $js = [
      'js/jquery.themepunch.tools.min.js',
      'js/jquery.themepunch.revolution.min.js',
      'js/swiper.jquery.min.js',
      'js/jquery.magnific-popup.min.js',
      'js/trx_addons.js',
      'js/jquery.blockUI.min.js',
      'js/add-to-cart.min.js',
      'js/js.cookie.min.js',
      'js/woocommerce.min.js',
      'js/cart-fragments.min.js',
      'js/woocommerce-add-to-cart.js',
      'js/superfish.min.js',
      'js/__scripts.js',
      'js/mediaelement-and-player.min.js',
      'js/mediaelement-migrate.min.js',
      'js/wp-mediaelement.min.js',
      'js/wp-embed.min.js',
      'js/js_composer_front.min.js',
      'js/waypoints.min.js',
      'js/vc-accordion.min.js',
      'js/vc-tta-autoplay.min.js',
      'js/vc-tabs.min.js',
      'js/core.min.js',
      'js/widget.min.js',
      'js/tabs.min.js',
      'js/effect.min.js',
      'js/effect-fade.min.js',
      'js/forms-api.min.js',
      'js/sb-instagram.min.js',
      'js/custom.js',
      'js/cart.min.js'
    ];
    public $depends = [
    ];
}
