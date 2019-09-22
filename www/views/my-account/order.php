<?php

use app\components\ShippingStatus;

$this->title = 'ԻՄ ԷՋԸ';

$months = array(
  1 => 'Հունվար',2 => 'Փետրվար.', 3 => 'Մարտ',4 => 'Ապրիլ',
  5 => 'Մայիս',6 => 'Հունիս',7 => 'Հուլիս',8 => 'Օգոստոս',
  9 => 'Սեպտեմբեր',10 => 'Հոկտեմբեր',11 => 'Նոյեմբեր',12 => 'ԴԵկտեմբեր'
);

Yii::$app->view->params['bodyClass'] = 'page-template-default page page-id-8 logged-in custom-background wp-custom-logo ua_chrome woocommerce-account woocommerce-page woocommerce-no-js body_tag scheme_default blog_mode_shop body_style_wide  is_stream blog_style_excerpt sidebar_hide expand_content trx_addons_present header_type_custom header_style_header-custom-848 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.5.5 vc_responsive';

$shippingStatus = new ShippingStatus();

?>
<article id="post-8" class="post_item_single post_type_page post-8 page type-page status-publish hentry">


	<div class="post_content entry-content">
		<div class="woocommerce">
      <?= $this->render('/my-account/partials/nav'); ?>



<div class="woocommerce-MyAccount-content">
  <?php if(Yii::$app->session->hasFlash('success')):?>
      <div class="info">
          <?php echo Yii::$app->session->getFlash('success'); ?>
      </div>
      <h3>Շնորհակալություն</h3>
  <?php endif; ?>
  <p id="order_review_heading">Ձեր պատվերը</p>
  <div class="sc_table sc_table_default">
    <table>
      <thead>
        <tr>
          <th class="product-name">Անուն(*ք)</th>
          <th class="order-delivery">Առաքում</th>
          <th class="order-total">Ընդհանուր</th>
          <th class="order-status">Կարգավիճակ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($orders as $order):?>
          <tr class="cart_item">
            <td class="product-name">
            <?=$product->title;?>&nbsp;
              <strong class="product-quantity">&times; <?=$order->qty;?></strong>
            </td>
            <td class="product-delivery">
                <?php
                  echo $order->day . ' ' . $months[$order->month] . ' ' . $order->time;
                ?>
            </td>
            <td class="product-total">
              <span class="woocommerce-Price-amount amount">
                <?=$order->qty*$product->price;?> <span class="woocommerce-Price-currencySymbol">֏</span>
              </span>
            </td>
            <td class="order-status">
                <?php
                  $color = '';
                  switch ($order->shipping_status) {
                    case 'AWAITING_ORDER':
                      $color = '#dada01';
                      break;
                    case 'ORDER_DISPATCHED':
                      $color = 'blue';
                      break;
                    case 'ORDER_DELIVERED':
                      $color = 'green';
                      break;
                    case 'ORDER_RETURNED':
                      $color = 'orange';
                      break;
                    case 'ORDER_FAILED':
                      $color = 'red';
                      break;
                  }
                ?>
                <span style="color:<?=$color?>;"><?=$shippingStatus->showConstantByName($order->shipping_status);?></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

    </table>
  </div>

<div class="woocommerce-notices-wrapper"></div></div>
</div>
	</div><!-- .entry-content -->


</article>
