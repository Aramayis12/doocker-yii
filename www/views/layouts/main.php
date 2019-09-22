<?php
/* @var $this \yii\web\View */
/* @var $content string */


use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\BaseUrl;
use app\models\Cart;
use yii\db\ActiveQuery;

AppAsset::register($this);

$controller = Yii::$app->controller;
$default_controller = Yii::$app->defaultRoute;
$isHome = (($controller->id === $default_controller) && ($controller->action->id === $controller->defaultAction)) ? true : false;

$web_path = Yii::getAlias('@web');

$cart_hash = $_COOKIE['cart_hash'];

$carts = Cart::find()->select([
    'product_title' => 'product.title', 
    'product_image' => 'product.image', 
    'product_slug' => 'product.slug',
    'cart.*'
    ])->leftJoin('product', 'product.id=cart.product_id')->asArray()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    <link rel='dns-prefetch' href='//maxcdn.bootstrapcdn.com' />
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel="alternate" type="application/rss+xml" title="HeartStar: Gift Ideas Shop &raquo; Feed" href="<?=Url::base(true);?>/feed/" />
    <link rel="alternate" type="application/rss+xml" title="HeartStar: Gift Ideas Shop &raquo; Comments Feed" href="<?=Url::base(true);?>/comments/feed/" />
    <meta property="og:url" content="<?=Url::base(true);?>/ " />
    <meta property="og:title" content="Home 1" />
    <meta property="og:description" content="[vc_empty_space height=&quot;6em&quot; alter_height=&quot;none&quot; hide_on_desktop=&quot;&quot; hide_on_notebook=&quot;&quot; hide_on_tablet=&quot;&quot;..." />
    <meta property="og:type" content="article" />

    <meta name="yandex-verification" content="73d9356f4bbf9ebe" />

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(52734205, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/52734205" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <style type="text/css">
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
  <style id='rs-plugin-settings-inline-css' type='text/css'>
        #rs-demo-id {}
    </style>
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <link property="stylesheet" rel='stylesheet' id='js_composer_front-css' href='<?=Yii::getAlias('@web')?>/css/js_composer.min.css?ver=5.5.5' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='wpgdprc.css-css' href='<?=Yii::getAlias('@web')?>/css/front.css?ver=1544035404' type='text/css' media='all' />
    <style id='wpgdprc.css-inline-css' type='text/css'>
        div.wpgdprc .wpgdprc-switch .wpgdprc-switch-inner:before {
            content: 'Yes';
        }

        div.wpgdprc .wpgdprc-switch .wpgdprc-switch-inner:after {
            content: 'No';
        }
    </style>

    <script type='text/javascript' src='<?=Yii::getAlias('@web')?>/js/jquery.js?ver=1.12.4'></script>
    <script type='text/javascript' src='<?=Yii::getAlias('@web')?>/js/jquery-migrate.min.js?ver=1.4.1'></script>
    <script type='text/javascript' src='<?=Yii::getAlias('@web')?>/js/lightbox.js?ver=2.1.6.1'></script>
    <script type='text/javascript' src='<?=Yii::getAlias('@web')?>/js/micromodal.min.js?ver=1544035404'></script>
    <link rel='https://api.w.org/' href='<?=Url::base(true);?>/wp-json/' />
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?=Url::base(true);?>/xmlrpc.php?rsd" />
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?=Url::base(true);?>/wp-includes/wlwmanifest.xml" />
    <meta name="generator" content="WordPress 4.9.8" />
    <meta name="generator" content="WooCommerce 3.5.1" />
    <link rel="canonical" href="<?=Url::base(true);?>/" />
    <link rel='shortlink' href='<?=Url::base(true);?>/' />
    <link rel="alternate" type="application/json+oembed" href="<?=Url::base(true);?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fspecialgifts.am%2F" />
    <link rel="alternate" type="text/xml+oembed" href="<?=Url::base(true);?>/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fspecialgifts.am%2F&#038;format=xml" />
<style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
<script>
// My code
// Cart section

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

var hash_id = makeid(32);

if(getCookie('cart_hash') == ''){
  setCookie('cart_hash', hash_id, 100);
}

console.log('hash_id: ', getCookie('cart_hash'));
</script>
    <script type='text/javascript'>
    /* <![CDATA[ */
    var sb_instagram_js_options = {"sb_instagram_at":"","font_method":"svg"};
    var login_ajax = {"url":"<?=Url::to(['/site/login'])?>"};
    var subscription_ajax = {"url":"<?=Url::to(['/site/subscribe'])?>"};
    var signup_ajax = {"url":"<?=Url::to(['/site/signup'])?>"};
    /* ]]> */
    </script>
    <script type="text/javascript">
        var ajaxRevslider;

        jQuery(document).ready(function() {
            // CUSTOM AJAX CONTENT LOADING FUNCTION
            ajaxRevslider = function(obj) {

                // obj.type : Post Type
                // obj.id : ID of Content to Load
                // obj.aspectratio : The Aspect Ratio of the Container / Media
                // obj.selector : The Container Selector where the Content of Ajax will be injected. It is done via the Essential Grid on Return of Content

                var content = "";

                data = {};

                data.action = 'revslider_ajax_call_front';
                data.client_action = 'get_slider_html';
                data.token = '1f889a513b';
                data.type = obj.type;
                data.id = obj.id;
                data.aspectratio = obj.aspectratio;

                // SYNC AJAX REQUEST
                jQuery.ajax({
                    type: "post",
                    url: "<?=Url::to('/')?>",
                    dataType: 'json',
                    data: data,
                    async: false,
                    success: function(ret, textStatus, XMLHttpRequest) {
                        if (ret.success == true)
                            content = ret.data;
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });

                // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
                return content;
            };

            // CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
            var ajaxRemoveRevslider = function(obj) {
                return jQuery(obj.selector + " .rev_slider").revkill();
            };

            // EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
            var extendessential = setInterval(function() {
                if (jQuery.fn.tpessential != undefined) {
                    clearInterval(extendessential);
                    if (typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
                        jQuery.fn.tpessential.defaults.ajaxTypes.push({
                            type: "revslider",
                            func: ajaxRevslider,
                            killfunc: ajaxRemoveRevslider,
                            openAnimationSpeed: 0.3
                        });
                        // type:  Name of the Post to load via Ajax into the Essential Grid Ajax Container
                        // func: the Function Name which is Called once the Item with the Post Type has been clicked
                        // killfunc: function to kill in case the Ajax Window going to be removed (before Remove function !
                        // openAnimationSpeed: how quick the Ajax Content window should be animated (default is 0.3)
                    }
                }
            }, 30);
        });
    </script>
    <noscript>
        <style>
            .woocommerce-product-gallery {
                opacity: 1 !important;
            }
        </style>
    </noscript>
    <style type="text/css">
        .recentcomments a {
            display: inline !important;
            padding: 0 !important;
            margin: 0 !important;
        }
    </style>
    <meta name="generator" content="Powered by WPBakery Page Builder - drag and drop page builder for WordPress." />
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="<?=Url::base(true);?>/wp-content/plugins/js_composer/assets/css/vc_lte_ie9.min.css" media="screen"><![endif]-->
    <style type="text/css" id="custom-background-css">
        body.custom-background {
            background-color: #ffffff;
        }
    </style>
    <meta name="generator" content="Powered by Slider Revolution 5.4.8 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface." />
    <link rel="icon" href="<?=Url::base(true);?>/image/cropped-favicon_512x512-32x32.jpg" sizes="32x32" />
    <link rel="icon" href="<?=Url::base(true);?>/image/cropped-favicon_512x512-192x192.jpg" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="<?=Url::base(true);?>/image/cropped-favicon_512x512-180x180.jpg" />
    <meta name="msapplication-TileImage" content="<?=Url::base(true);?>/image/cropped-favicon_512x512-270x270.jpg" />
    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                e.c = jQuery(e.c);
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f),
                    "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };
    </script>
    <style type="text/css" data-type="vc_shortcodes-custom-css">
        .vc_custom_1536329283644 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2018/09/bg_up-nocopyright.jpg?id=1574) !important;
            background-position: bottom center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1535442810388 {
            background-color: #ffffff !important;
        }

        .vc_custom_1536330324071 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2018/09/bg_mid-nocopyright.jpg?id=1577) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1541507955631 {
            background-color: #4e1c76 !important;
        }

        .vc_custom_1541508076660 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2018/09/bg_up-nocopyright.jpg?id=1574) !important;
            background-position: bottom center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1535529223749 {
            background-color: #ffffff !important;
            background-size: cover !important;
        }

        .vc_custom_1541510365153 {
            background-image: url(<?=Url::base(true);?>/image/only_today_1.jpg?id=945) !important;
            background-position: center right !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1541510336333 {
            background-image: url(<?=Url::base(true);?>/image/home-2.png?id=1082) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1533562220340 {
            margin-bottom: 2em !important;
        }

        .vc_custom_1535443201180 {
            padding-right: 0px !important;
            padding-left: 0px !important;
            background-color: #ffffff !important;
        }

        .vc_custom_1531316596925 {
            background-color: #ffffff !important;
        }

        .vc_custom_1531838825631 {
            background-color: #ffffff !important;
        }

        .vc_custom_1534155422198 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2017/10/bg-9.jpg?id=416) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1541494783637 {
            background: #4c1c72 url(<?=Url::base(true);?>/wp-content/uploads/2018/11/dots-banner-nocopyright.png?id=1743) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
        }

        .vc_custom_1532679761452 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2017/10/bg-10.jpg?id=421) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1533724054541 {
            background-image: url(<?=Url::base(true);?>/image/take_an_extra.jpg?id=951) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1533719274897 {
            background-image: url(<?=Url::base(true);?>/wp-content/uploads/2017/10/bg-10.jpg?id=421) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1533719667060 {
            background-image: url(<?=Url::base(true);?>/image/take_an_extra.jpg?id=951) !important;
            background-position: center !important;
            background-repeat: no-repeat !important;
            background-size: cover !important;
        }

        .vc_custom_1533719502633 {
            padding-top: 1em !important;
        }
    </style>
    <noscript>
        <style type="text/css">
            .wpb_animate_when_almost_visible {
                opacity: 1;
            }
        </style>
    </noscript>
    <style type="text/css" id="trx_addons-inline-styles-inline-css">
        .vc_custom_1533221531199 {
            background-color: #ffffff !important;
        }

        .vc_custom_1533566203337 {
            padding-top: 10px !important;
        }

        .vc_custom_1533566008017 {
            padding-bottom: 10px !important;
        }

        .vc_custom_1533566018424 {
            padding-bottom: 10px !important;
        }

        .vc_custom_1506951513354 {
            background-color: #281637 !important;
        }

        .vc_custom_1531229576938 {
            background-color: #281637 !important;
        }
    </style>
    <style>
        " + htmlDivCss + "
    </style>
    <style>
        " + htmlDivCss + "
    </style>
    <style>
        ' + htmlDivCss + '
    </style>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style type="text/css" id="trx_addons-inline-styles-inline-css">.vc_custom_1532427252080{background-color: #ffffff !important;}.vc_custom_1533803490274{border-bottom-width: 1px !important;border-bottom-color: #e0e0e1 !important;border-bottom-style: solid !important;}.vc_custom_1533809073555{padding-top: 10px !important;}.vc_custom_1533809142294{padding-bottom: 10px !important;}.vc_custom_1533809155953{padding-bottom: 10px !important;}.vc_custom_1506951513354{background-color: #281637 !important;}.vc_custom_1531229576938{background-color: #281637 !important;}</style>
</head>

<body class="<?=(isset($this->params['bodyClass']))?$this->params['bodyClass']:''?>">
<?php $this->beginBody() ?>
    <div class="body_wrap">

        <div class="page_wrap">
            <header class="top_panel top_panel_custom top_panel_custom_1211 top_panel_custom_header-homepage without_bg_image">
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1533221531199 vc_row-has-fill shape_divider_top-none shape_divider_bottom-none sc_layouts_hide_on_mobile">
                    <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div id="sc_content_1059631036" class="sc_content sc_content_default sc_content_width_1_1 sc_float_center">
                                    <div class="sc_content_container">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid vc_row-o-content-middle vc_row-flex shape_divider_top-none shape_divider_bottom-none sc_layouts_row sc_layouts_row_type_compact">
                                            <div class="wpb_column vc_column_container vc_col-sm-5 sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_socials_1988454452" class="sc_socials sc_socials_default">
                                                                <div class="socials_wrap">
                                                                <a target="_blank" href="https://fb.me/SpecialGifts.am" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                                                                  <span class="social_icon social_icon_003_facebook">
                                                                    <span class="icon-003_facebook"></span>
                                                                  </span>
                                                                </a>
                                                                  <a target="_blank" href="https://www.instagram.com/specialgifts.am/" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                                                                  <span class="social_icon social_icon_instagramm">
                                                                    <span class="icon-instagramm"></span>
                                                                  </span>
                                                                  </a>

                                                                </div>
                                                                <!-- /.socials_wrap -->
                                                            </div>
                                                            <!-- /.sc_socials -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-2 sc_layouts_column sc_layouts_column_align_center sc_layouts_column_icons_position_left">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="sc_layouts_item">
                                                            <a href="<?=Url::home()?>" id="sc_layouts_logo_1594700644" class="sc_layouts_logo sc_layouts_logo_default">
                                                            <img class="logo_image" src="<?=$web_path . '/image/v1.png'?>" alt="HeartStar: Gift Ideas Shop" width="230" height="146"></a>
                                                            <!-- /.sc_layouts_logo -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-5 sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <!--<div class="sc_layouts_item">
                                                            <div id="sc_layouts_search_160518472" class="sc_layouts_search">
                                                                <div class="search_wrap search_style_fullscreen layouts_search">
                                                                    <div class="search_form_wrap">
                                                                        <form role="search" method="get" class="search_form" action="<?=Url::base(true);?>/">
                                                                            <input type="text" class="search_field" placeholder="Search" value="" name="s">
                                                                            <button type="submit" class="search_submit trx_addons_icon-search"></button>
                                                                            <a class="search_close trx_addons_icon-delete"></a>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_layouts_login_1454059344" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                                                <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                                                    <li class="menu-item">
                                                                      <a href="<?=Url::to(['/cart']);?>" class="trx_addons_login_link">
                                                                        <span class="sc_layouts_item_details sc_layouts_login_details">
                                                                        <span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Պատվիրել</span>
                                                                      </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php if(Yii::$app->getUser()->isGuest):?>
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_layouts_login_1454059344" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                                                <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                                                    <li class="menu-item">
                                                                      <a href="#trx_addons_login_popup" class="trx_addons_popup_link trx_addons_login_link">
                                                                        <span class="sc_layouts_item_details sc_layouts_login_details">
                                                                        <span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Մուտք</span>
                                                                      </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <?php else:?>
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_layouts_login_1454059344" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                                                <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                                                    <li class="menu-item">
                                                                      <a href="<?=Url::to('my-account');?>" class="trx_addons_login_link">
                                                                        <span class="sc_layouts_item_details sc_layouts_login_details">
                                                                        <span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Իմ էջը</span>
                                                                      </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.sc_layouts_login -->
                                                        </div>
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_layouts_login_1454059344" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                                                <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                                                    <li class="menu-item">
                                                                      <a href="<?=Url::to(['site/logout']);?>" class="trx_addons_login_link">
                                                                        <span class="sc_layouts_item_details sc_layouts_login_details">
                                                                        <span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Դուրս գալ</span>
                                                                      </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.sc_layouts_login -->
                                                        </div>
                                                        <?php endif;?>
                                                        <div class="sc_layouts_item">
                                                            <div id="sc_layouts_cart_1471102630" class="sc_layouts_cart">
                                                                <span class="sc_layouts_item_icon sc_layouts_cart_icon sc_icons_type_icons trx_addons_icon-basket"></span>
                                                                <span class="sc_layouts_item_details sc_layouts_cart_details">
						<span class="sc_layouts_item_details_line2 sc_layouts_cart_totals">
				<span class="sc_layouts_cart_items">0 items</span> -
                                                                <span class="sc_layouts_cart_summa">&#36;0.00</span>
                                                                </span>
                                                                </span>
                                                                <span class="sc_layouts_cart_items_short"><?=count($carts)?></span>
                                                                <div class="sc_layouts_cart_widget widget_area">
                                                                    <span class="sc_layouts_cart_widget_close trx_addons_icon-cancel"></span>
                                                                    <div class="widget woocommerce widget_shopping_cart">
                                                                        <div class="widget_shopping_cart_content">
                                                                            <?php if(count($carts) == 0): ?>
                                                                                <p class="woocommerce-mini-cart__empty-message">Ձեր զամբյուղը դատարկ է:</p>
                                                                            <?php else: ?>
                                                                                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                                                    <?php $subTotal = 0;
                                                                                    foreach($carts as $cart):?>
                                                                                    <li class="woocommerce-mini-cart-item mini_cart_item">
                                                                                        <a href="<?=Url::base(true);?>/cart?remove_item=<?=$cart['id'];?>" class="remove remove_from_cart_button" aria-label="Remove this item" data-product_id="" data-cart_item_key="<?=$cart['id'];?>" data-product_sku="">×</a>
                                                                                        <a href="<?=Url::base(true);?>/product/<?=$cart['product_slug']?>">
                                                                                            <img 
                                                                                            width="300" 
                                                                                            height="300" 
                                                                                            src="<?=Yii::getAlias('@web/') . $cart['product_image'];?>"
                                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" 
                                                                                            srcset="<?=Yii::getAlias('@web/') . $cart['product_image'];?> 300w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 90w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 760w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 370w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 150w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 768w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 600w, <?=Yii::getAlias('@web/') . $cart['product_image'];?> 1000w" sizes="(max-width: 300px) 100vw, 300px">
                                                                                            <?=$cart['product_title'];?>							
                                                                                        </a>
                                                                                        <span class="quantity"><?=$cart['qty'];?> × 
                                                                                            <span class="woocommerce-Price-amount amount">
                                                                                                <?=$cart['price'];?> <span class="woocommerce-Price-currencySymbol">֏</span>
                                                                                            </span>
                                                                                        </span>
                                                                                    </li>
                                                                                    <?php $subTotal += $cart['qty'] * $cart['price']; endforeach; ?>
                                                                                </ul>
                                                                                <p class="woocommerce-mini-cart__total total">
                                                                                    <strong>Ընդամենը:</strong>
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <?=$subTotal;?> <span class="woocommerce-Price-currencySymbol">֏</span>
                                                                                    </span>
                                                                                </p>
                                                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                                                    <a href="<?=Url::base(true);?>/cart/" class="button wc-forward">Դիտել զամբյուղը</a>
                                                                                    <a href="<?=Url::base(true);?>/checkout/" class="button checkout wc-forward">Վճարում</a>
                                                                                </p>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.sc_content -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid shape_divider_top-none shape_divider_bottom-none sc_layouts_hide_on_mobile">
                    <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div id="sc_content_701228682" class="sc_content sc_content_default sc_content_width_1_1 sc_float_center">
                                    <div class="sc_content_container">
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid shape_divider_top-none shape_divider_bottom-none">
                                            <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column sc_layouts_column_align_center sc_layouts_column_icons_position_left">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="sc_layouts_item">
                                                            <nav class="sc_layouts_menu sc_layouts_menu_default sc_layouts_menu_dir_horizontal menu_hover_fade hide_on_mobile" id="sc_layouts_menu_11313409">
                                                                <ul id="menu_main" class="sc_layouts_menu_nav menu_main_nav">
                                                                    <li id="menu-item-106" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-106">
                                                                      <a href="<?=Url::home()?>"><span>Գլխավոր</span></a>
                                                                    </li>
                                                                    <li id="menu-item-118" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-117">
                                                                      <a href="<?=Url::to(['/blogs'])?>"><span>Բլոգ</span></a>
                                                                    </li>
                                                                    <li id="menu-item-117" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-117">
                                                                      <a href="<?=Url::to(['/site/about'])?>"><span>Մեր Մասին</span></a>
                                                                    </li>

                                                                    <!--<li id="menu-item-116" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-116"><a href="<?=Url::base(true);?>/what-we-do/"><span>Ինչ ենք մենք անում</span></a></li>-->
                                                                    <!--<li id="menu-item-114" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-114"><a href="<?=Url::base(true);?>/shop/"><span>Խանութ</span></a></li>-->

                                                                    <li id="menu-item-1540" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1540"><a href="<?=Url::base(true);?>/contact"><span>Կապ</span></a></li>
                                                                </ul>
                                                            </nav>
                                                            <!-- /.sc_layouts_menu -->
                                                            <div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
                                                                <a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
                                                                    <span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.sc_content -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-middle vc_row-flex shape_divider_top-none shape_divider_bottom-none sc_layouts_row sc_layouts_row_type_compact sc_layouts_hide_on_desktop sc_layouts_hide_on_notebook sc_layouts_hide_on_tablet">
                    <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column sc_layouts_column_align_center sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner vc_custom_1533566203337">
                            <div class="wpb_wrapper">
                                <!--<div class="sc_layouts_item">
                                    <div id="sc_layouts_search_198886134" class="sc_layouts_search">
                                        <div class="search_wrap search_style_fullscreen layouts_search">
                                            <div class="search_form_wrap">
                                                <form role="search" method="get" class="search_form" action="<?=Url::base(true);?>/">
                                                    <input type="text" class="search_field" placeholder="Search" value="" name="s">
                                                    <button type="submit" class="search_submit trx_addons_icon-search"></button>
                                                    <a class="search_close trx_addons_icon-delete"></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="sc_layouts_item">
                                    <div id="sc_layouts_login_1738658830" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                        <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                            <li class="menu-item">
                                              <a href="<?=Url::to(['/cart']);?>" class="trx_addons_login_link">
                                                <span class="sc_layouts_item_details sc_layouts_login_details">
                                                <span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Պատվիրել</span>
                                                </span>
                                              </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /.sc_layouts_login -->
                                </div>
                                <?php if(Yii::$app->getUser()->isGuest):?>
                                <div class="sc_layouts_item">
                                    <div id="sc_layouts_login_1738658830" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                        <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                            <li class="menu-item"><a href="#trx_addons_login_popup" class="trx_addons_popup_link trx_addons_login_link "><span class="sc_layouts_item_details sc_layouts_login_details"><span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Մուտք</span></span></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.sc_layouts_login -->
                                </div>
                                <?php else:?>
                                <div class="sc_layouts_item">
                                    <div id="sc_layouts_login_1738658830" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                        <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">
                                            <li class="menu-item"><a href="<?=Url::to(['/my-account']);?>" class="trx_addons_login_link "><span class="sc_layouts_item_details sc_layouts_login_details"><span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Իմ էջը</span></span></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.sc_layouts_login -->
                                </div>

                                <div class="sc_layouts_item">
                                    <div id="sc_layouts_login_1738658830" class="sc_layouts_login sc_layouts_menu sc_layouts_menu_default">
                                        <ul class="sc_layouts_login_menu sc_layouts_menu_nav sc_layouts_menu_no_collapse">

                                            <li class="menu-item"><a href="<?=Url::to(['/site/logout']);?>" class="trx_addons_login_link "><span class="sc_layouts_item_details sc_layouts_login_details"><span class="sc_layouts_item_details_line1 sc_layouts_iconed_text_line1">Դուրս գալ</span></span></a></li>
                                        </ul>
                                    </div>
                                    <!-- /.sc_layouts_login -->
                                </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-xs-7 sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner vc_custom_1533566008017">
                            <div class="wpb_wrapper">
                                <div class="sc_layouts_item">
                                    <a href="<?=Url::home()?>" id="sc_layouts_logo_466925773" class="sc_layouts_logo sc_layouts_logo_default">
                                    <img class="logo_image" src="<?=$web_path . '/image/v1.png'?>" alt="HeartStar: Gift Ideas Shop" width="115" height="73"></a>
                                    <!-- /.sc_layouts_logo -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-xs-5 sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner vc_custom_1533566018424">
                            <div class="wpb_wrapper">
                                <div class="sc_layouts_item">
                                    <div id="sc_layouts_cart_520154850" class="sc_layouts_cart">
                                        <span class="sc_layouts_item_icon sc_layouts_cart_icon sc_icons_type_icons trx_addons_icon-basket"></span>
                                        <span class="sc_layouts_item_details sc_layouts_cart_details">
						<span class="sc_layouts_item_details_line2 sc_layouts_cart_totals">
				<span class="sc_layouts_cart_items">0 items</span> -
                                        <span class="sc_layouts_cart_summa">&#36;0.00</span>
                                        </span>
                                        </span>
                                        <span class="sc_layouts_cart_items_short">0</span>
                                        <div class="sc_layouts_cart_widget widget_area">
                                            <span class="sc_layouts_cart_widget_close trx_addons_icon-cancel"></span>
                                            <div class="widget woocommerce widget_shopping_cart">
                                                <div class="widget_shopping_cart_content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc_layouts_item sc_layouts_item_menu_mobile_button">
                                    <div id="sc_layouts_menu_1380789364" class="sc_layouts_iconed_text sc_layouts_menu_mobile_button sc_layouts_menu_mobile_button_burger without_menu">
                                        <a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#">
                                            <span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <?php if(!$isHome):?>
                <div class="vc_row wpb_row vc_row-fluid vc_custom_1532427252080 vc_row-has-fill shape_divider_top-none shape_divider_bottom-none">
																		<div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
																			<div class="vc_column-inner">
																				<div class="wpb_wrapper">
																					<div id="sc_content_1847002816" class="sc_content sc_content_default sc_content_width_1_1 sc_float_center">
																						<div class="sc_content_container">
																							<div class="vc_row wpb_row vc_inner vc_row-fluid shape_divider_top-none shape_divider_bottom-none">
																								<div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column_icons_position_left">
																									<div class="vc_column-inner">
																										<div class="wpb_wrapper">
																											<div class="vc_empty_space"   style="height: 3.5em" >
																												<span class="vc_empty_space_inner"></span>
																											</div>
																											<div class="sc_layouts_item">
																												<div id="sc_layouts_title_786768334" class="sc_layouts_title sc_align_center with_content without_image without_tint">
																													<div class="sc_layouts_title_content">
																														<div class="sc_layouts_title_title">
																															<h1 class="sc_layouts_title_caption"><?=$this->title?></h1>
																														</div>
																														<div class="sc_layouts_title_breadcrumbs">
																															<div class="breadcrumbs">
																																<a class="breadcrumbs_item home" href="<?=Url::home('')?>">Գլխավոր</a>
																																<span class="breadcrumbs_delimiter"></span>
																																<span class="breadcrumbs_item current"><?=$this->title?></span>
																															</div>
																														</div>
																													</div>
																													<!-- .sc_layouts_title_content -->
																												</div>
																												<!-- /.sc_layouts_title -->
																											</div>
																											<div class="vc_empty_space"   style="height: 3.7em" >
																												<span class="vc_empty_space_inner"></span>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																					<!-- /.sc_content -->
																				</div>
																			</div>
																		</div>
																	</div>
                <?php endif; ?>



            </header>
            <div class="menu_mobile_overlay"></div>
            <div class="menu_mobile menu_mobile_fullscreen scheme_dark">
                <div class="menu_mobile_inner">
                    <a class="menu_mobile_close icon-cancel"></a>
                    <a class="sc_layouts_logo" href="<?=Url::base(true);?>/"><img src="<?=$web_path . '/image/v1.png'?>" alt="HeartStar: Gift Ideas Shop" width="115" height="73"></a>
                    <nav itemscope itemtype="http://schema.org/SiteNavigationElement" class="menu_mobile_nav_area">
                        <ul id="menu_mobile" class=" menu_mobile_nav">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-106">
                              <a href="<?=Url::home()?>"><span>Գլխավոր</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-118">
                              <a href="<?=Url::to(['/blogs'])?>"><span>Բլոգ</span></a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-117">
                              <a href="<?=Url::to(['/site/about'])?>"><span>Մեր Մասին</span></a>
                            </li>
                            <!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-116"><a href="<?=Url::base(true);?>/what-we-do/"><span>Ինչ ենք մենք անում</span></a></li>-->
                            <!--<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-114"><a href="<?=Url::base(true);?>/shop/"><span>Խանութ</span></a></li>-->
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1540"><a href="<?=Url::base(true);?>/contact"><span>Կապ</span></a></li>
                        </ul>
                    </nav>
                    <!--
                    <div class="search_wrap search_style_normal search_mobile">
                        <div class="search_form_wrap">
                            <form role="search" method="get" class="search_form" action="<?=Url::base(true);?>/">
                                <input type="text" class="search_field" placeholder="Search" value="" name="s">
                                <button type="submit" class="search_submit trx_addons_icon-search"></button>
                            </form>
                        </div>
                    </div>
                    -->
                    <div class="socials_mobile">
                      <a target="_blank" href="https://fb.me/SpecialGifts.am" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                        <span class="social_icon social_icon_facebook">
                          <span class="icon-facebook"></span>
                        </span>
                      </a>
                      <a target="_blank" href="https://www.instagram.com/specialgifts.am/" class="social_item social_item_style_icons sc_icon_type_icons social_item_type_icons">
                        <span class="social_icon social_icon_013_insta">
                        <span class="icon-013_insta"></span>
                        </span>
                      </a>

                    </div>
                </div>
            </div>

            <div class="page_content_wrap">

                <div class="content_wrap">

                    <div class="content">

                        <?=$content?>

                    </div>
                    <!-- </.content> -->

                </div>
                <!-- </.content_wrap> -->
            </div>
            <!-- </.page_content_wrap> -->

            <footer class="footer_wrap footer_custom footer_custom_21 footer_custom_footer-default scheme_dark">

                <div class="vc_row wpb_row vc_row-fluid vc_custom_1531229576938 vc_row-has-fill vc_row-o-content-middle vc_row-flex shape_divider_top-none shape_divider_bottom-none scheme_dark">
                    <div class="wpb_column vc_column_container vc_col-sm-12 sc_layouts_column sc_layouts_column_align_center sc_layouts_column_icons_position_left">
                        <div class="vc_column-inner">
                            <div class="wpb_wrapper">
                                <div id="sc_content_1549669883" class="sc_content sc_content_default sc_float_left">
                                    <div class="sc_content_container">
                                        <div class="vc_empty_space" style="height: 3em"><span class="vc_empty_space_inner"></span></div>
                                        <div class="vc_wp_text wpb_content_element">
                                            <div class="widget widget_text">
                                                <div class="textwidget">
                                                    <p><a href="https://themeforest.net/user/axiomthemes/portfolio" target="_blank" rel="noopener">SpecialGifts</a> © <?=date('Y')?> Բոլոր իրավունքները պաշտպանված են:</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vc_empty_space" style="height: 2em"><span class="vc_empty_space_inner"></span></div>
                                    </div>
                                </div>
                                <!-- /.sc_content -->
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- /.footer_wrap -->

        </div>
        <!-- /.page_wrap -->

    </div>
    <!-- /.body_wrap -->

    <a href="#" class="trx_addons_scroll_to_top trx_addons_icon-up" title="Scroll to top"></a>
    <!-- Instagram Feed JS -->
    <script type="text/javascript">
        var sbiajaxurl = "<?=Url::to('/')?>";
    </script>
    <div id="trx_addons_login_popup" class="trx_addons_popup mfp-hide">
        <div class="trx_addons_tabs">
            <ul class="trx_addons_tabs_titles">
                <li class="trx_addons_tabs_title trx_addons_tabs_title_login">
                    <a href="#trx_addons_login_content">
                        <i class="trx_addons_icon-lock-open"></i> Մուտք </a>
                </li>
                <li class="trx_addons_tabs_title trx_addons_tabs_title_register">
                    <a href="#trx_addons_register_content">
                        <i class="trx_addons_icon-user-plus"></i> Գրանցվել </a>
                </li>
            </ul>
            <div id="trx_addons_login_content" class="trx_addons_tabs_content trx_addons_login_content">
                <div>
                    <div class="trx_addons_popup_form_wrap trx_addons_popup_form_wrap_login">

                        <?php $form = ActiveForm::begin([
                          'id' => 'login-form',
                          'action' => 'site/login',
                          'options'=>[
                            'name' => 'loginForm',
                            'class' => 'trx_addons_popup_form trx_addons_popup_form_login sc_input_hover_iconed',
                          ],
                          'enableAjaxValidation' => true,
                          'enableClientScript' => false
                        ]); ?>
                            <p style='color: #fe3c5c;' id="loginFormError"></p>
                            <input type="hidden" id="login_redirect_to" name="redirect_to" value="">
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_login">
                                <label class="sc_form_field sc_form_field_log sc_form_field_text required"><span class="sc_form_field_wrap"><input type="text" name="email" id="log_1274966564" value="" aria-required="true">
                                    <span class="sc_form_field_hover">
                                      <i class="sc_form_field_icon trx_addons_icon-user-alt"></i>
                                      <span class="sc_form_field_content" data-content="Login">էլ. Փոստի հասցե</span>
                                    </span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
                                <label class="sc_form_field sc_form_field_pwd sc_form_field_password required"><span class="sc_form_field_wrap"><input type="password" name="password"
					id="pwd_201994483"
					value="" aria-required="true"><span class="sc_form_field_hover"><i class="sc_form_field_icon trx_addons_icon-lock"></i><span class="sc_form_field_content" data-content="Password">Գաղտնաբառ</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_remember">
                                <a href="<?=Url::base(true);?>/my-account/lost-password/" class="trx_addons_popup_form_field_forgot_password">Մոռացել եք գաղտնաբա՞ռը</a>
                                <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                                <label for="rememberme"> Հիշել</label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_submit">
                                <input type="submit" class="submit_button" value="Մուտք">
                            </div>
                            <div class="trx_addons_message_box sc_form_result"></div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div id="trx_addons_register_content" class="trx_addons_tabs_content">
                <div class="trx_addons_popup_form_wrap trx_addons_popup_form_wrap_register">
                <?php $form = ActiveForm::begin([
                  'id' => 'signup-form',
                  'action' => 'site/signup',
                  'options'=>[
                    'name' => 'Signup',
                    'class' => 'trx_addons_popup_form trx_addons_popup_form_register sc_input_hover_iconed',
                  ],
                  'enableAjaxValidation' => true,
                  'enableClientScript' => false
                ]); ?>
                <p style='color: #fe3c5c;' id="signupFormError"></p>
                        <input type="hidden" id="register_redirect_to" name="redirect_to" value="">
                        <div class="trx_addons_left_side">
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_login">
                                <label class="sc_form_field sc_form_field_log sc_form_field_text required"><span class="sc_form_field_wrap"><input type="text"
					name="username"
					id="log_1594081357"
					value="" aria-required="true"><span class="sc_form_field_hover"><i class="sc_form_field_icon trx_addons_icon-user-alt"></i><span class="sc_form_field_content" data-content="Login">Անուն</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_email">
                                <label class="sc_form_field sc_form_field_email sc_form_field_text required"><span class="sc_form_field_wrap"><input type="text"
					name="email"
					id="email_437120777"
					value="" aria-required="true"><span class="sc_form_field_hover"><i class="sc_form_field_icon trx_addons_icon-mail"></i><span class="sc_form_field_content" data-content="E-mail">էլ. Փոստի հասցե</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_agree">
                                <input type="checkbox" value="1" id="i_agree_privacy_policy_registration" name="i_agree_privacy_policy">
                                <label for="i_agree_privacy_policy_registration">
                                Ես համաձայն եմ, որ իմ նշած տվյալները հավաքագրվեն և պահպանվեն․
                                Մանրամասների համար դիտեք մեր
                                 <a href="<?=Url::base(true);?>/privacy-policy/" target="_blank">
                                 Գաղտնիության քաղաքականությունը</a></label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_agree">
                                <input type="checkbox" value="agree" id="agree" name="agree">
                                <label for="agree"> Ես համաձայն եմ <a href="#">Պայմաններին</a></label>
                            </div>
                        </div>
                        <div class="trx_addons_right_side">
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
                                <label class="sc_form_field sc_form_field_pwd sc_form_field_password required"><span class="sc_form_field_wrap"><input type="password"
					name="password"
					id="pwd_1290751010"
					value="" aria-required="true"><span class="sc_form_field_hover"><i class="sc_form_field_icon trx_addons_icon-lock"></i><span class="sc_form_field_content" data-content="Password">Գաղտնաբառ</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_password">
                                <label class="sc_form_field sc_form_field_pwd2 sc_form_field_password required"><span class="sc_form_field_wrap"><input type="password"
					name="retypePassword"
					id="pwd2_1990540073"
					value="" aria-required="true"><span class="sc_form_field_hover"><i class="sc_form_field_icon trx_addons_icon-lock"></i><span class="sc_form_field_content" data-content="Confirm Password">Կրկնել Գաղտ․֊ը</span></span>
                                    </span>
                                </label>
                            </div>
                            <div class="trx_addons_popup_form_field trx_addons_popup_form_field_pwd_description">
                                Ամենաքիչը 6 նիշ </div>
                        </div>
                        <div class="trx_addons_popup_form_field trx_addons_popup_form_field_submit">
                            <input type="submit" class="submit_button" value="Գրանցվել" disabled="disabled">
                        </div>
                        <div class="trx_addons_message_box sc_form_result"></div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
            <button title="Close (Esc)" type="button" class="mfp-close">×</button>
        </div>
    </div>
    <script>
        (function() {
            function addEventListener(element, event, handler) {
                if (element.addEventListener) {
                    element.addEventListener(event, handler, false);
                } else if (element.attachEvent) {
                    element.attachEvent('on' + event, handler);
                }
            }

            function maybePrefixUrlField() {
                if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
                    this.value = "http://" + this.value;
                }
            }

            var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
            if (urlFields && urlFields.length > 0) {
                for (var j = 0; j < urlFields.length; j++) {
                    addEventListener(urlFields[j], 'blur', maybePrefixUrlField);
                }
            } /* test if browser supports date fields */
            var testInput = document.createElement('input');
            testInput.setAttribute('type', 'date');
            if (testInput.type !== 'date') {

                /* add placeholder & pattern to all date fields */
                var dateFields = document.querySelectorAll('.mc4wp-form input[type="date"]');
                for (var i = 0; i < dateFields.length; i++) {
                    if (!dateFields[i].placeholder) {
                        dateFields[i].placeholder = 'YYYY-MM-DD';
                    }
                    if (!dateFields[i].pattern) {
                        dateFields[i].pattern = '[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])';
                    }
                }
            }

        })();
    </script>
    <script type="text/javascript">
        var c = document.body.className;
        c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
        document.body.className = c;
    </script>
    <script type="text/javascript">
        function revslider_showDoubleJqueryError(sliderID) {
            var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
            errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
            errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
            errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
            errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
            jQuery(sliderID).show().html(errorMessage);
        }
    </script>
    <link property="stylesheet" rel='stylesheet' id='animate-css-css' href='<?=Yii::getAlias('@web')?>/css/animate.min.css?ver=5.5.5' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='vc_tta_style-css' href='<?=Yii::getAlias('@web')?>/css/js_composer_tta.min.css?ver=5.5.5' type='text/css' media='all' />
    <link property="stylesheet" rel='stylesheet' id='font-awesome-css' href='<?=Yii::getAlias('@web')?>/css/font-awesome.min.css?ver=5.5.5' type='text/css' media='all' />

    <script type="text/javascript">
        // Parse the URL
        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        // Give the URL parameters variable names
        var source = getParameterByName('utm_source');

        if(source != ''){
            document.cookie = "utm_source="+source+"; path=/;";
        }
    </script>

<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>
