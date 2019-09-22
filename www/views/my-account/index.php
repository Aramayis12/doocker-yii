<?php

use yii\helpers\Url;

$this->title = 'ԻՄ ԷՋԸ';

$months = array(
  1 => 'Հունվար',2 => 'Փետրվար.', 3 => 'Մարտ',4 => 'Ապրիլ',
  5 => 'Մայիս',6 => 'Հունիս',7 => 'Հուլիս',8 => 'Օգոստոս',
  9 => 'Սեպտեմբեր',10 => 'Հոկտեմբեր',11 => 'Նոյեմբեր',12 => 'ԴԵկտեմբեր'
);

Yii::$app->view->params['bodyClass'] = 'page-template-default page page-id-8 logged-in custom-background wp-custom-logo ua_chrome woocommerce-account woocommerce-page woocommerce-no-js body_tag scheme_default blog_mode_shop body_style_wide  is_stream blog_style_excerpt sidebar_hide expand_content trx_addons_present header_type_custom header_style_header-custom-848 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.5.5 vc_responsive';
?>
<article id="post-8" class="post_item_single post_type_page post-8 page type-page status-publish hentry">


	<div class="post_content entry-content">
		<div class="woocommerce">
      <?= $this->render('/my-account/partials/nav'); ?>



<div class="woocommerce-MyAccount-content">
  <?php if(Yii::$app->session->hasFlash('success')):?>
      <h3>Շնորհակալություն</h3>

      <div class="info">
          <?php echo Yii::$app->session->getFlash('success'); ?>
      </div>

      <script type="text/javascript">
          document.cookie = "utm_source=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      </script>
  <?php endif; ?>
  
  <p>Բարև <?=Yii::$app->user->identity->username?>:</p>
  <p>Ձեր էջում դուք կարող էք տեսնել ձեր կատարած <a href="<?=Url::to('/my-account/orders');?>">պատվերները։</a></p>
<div class="woocommerce-notices-wrapper"></div></div>
</div>
	</div><!-- .entry-content -->


</article>
