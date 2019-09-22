<?php

use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Special Gifts';

Yii::$app->view->params['bodyClass'] = 'page-template-default page page-id-6 custom-background wp-custom-logo ua_chrome woocommerce-cart woocommerce-page woocommerce-no-js body_tag scheme_default blog_mode_shop is_stream blog_style_excerpt sidebar_show trx_addons_present header_type_custom header_style_header-custom-848 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.5.5 vc_responsive'; // body_style_wide sidebar_left
?>
<article id="post-6" class="post_item_single post_type_page post-6 page type-page status-publish hentry">


	<div class="post_content entry-content">
		<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>

	<?php $form = ActiveForm::begin([
		'id' => 'cart-form',
		'action' => 'checkout',
		'options'=>[
			'name' => 'CartForm',
			'class' => 'woocommerce-cart-form',
		]
	]); ?>
	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents inited" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name">Անվանում</th>
				<th class="product-price">Գին</th>
				<th class="product-quantity">Քանակ</th>
				<th class="product-subtotal">Ընդհանուր</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td  colspan="6">
					<span>🔴 Ձեր պատվերը կառաքվի մինչև 10 աշխատանքային օրվա ընթացքում։</span>
				</td>
			</tr>
			<?php $totalPrice = 0; foreach($carts as $cart): ?>


				<tr class="woocommerce-cart-form__cart-item cart_item">

					<td class="product-remove">
						<a href="#" data-cart_item_key="<?=$cart['id'];?>" class="remove" aria-label="Remove this item" data-product_id="293" data-product_sku="">&times;</a>						</td>

					<td class="product-thumbnail">
						<a href="<?=Url::base(true);?>/product/<?=$cart['product_slug']?>?attribute_pa_volume=250">
						<img width="300" height="300" 
						src="src="<?=Yii::getAlias('@web/') . $cart['product_image'];?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" 
						srcset="
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 300w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 90w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 760w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 370w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 150w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 768w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 600w, 
						<?=Yii::getAlias('@web/') . $cart['product_image'];?> 1000w" 
						sizes="(max-width: 300px) 100vw, 300px" /></a>						
					</td>

					<td class="product-name" data-title="Product">
						<!-- <a href="<?=Url::base(true);?>/product/<?=$cart['product_slug']?>?attribute_pa_volume=250">Red Lunch Box - 250</a>-->
						<?=$cart['product_title']?>
					</td>

					<td class="product-price" data-title="Price" data-price="<?=$cart['price'];?>">
						<?=$cart['price'];?> <span class="woocommerce-Price-currencySymbol">֏</span>
					</td>

					<td class="product-quantity" data-title="Quantity">
						<div class="quantity">
						<label class="screen-reader-text" for="quantity_5c7fb2968236c">Quantity</label>
						<input
							type="number"
							class="quantity_input_carts"
							class="input-text qty text"
							step="1"
							min="0"
							max=""
							name="qty"
							value="<?=$cart['qty'];?>"
							title="Qty"
							size="4"
							pattern="[0-9]*"
							inputmode="numeric"
							aria-labelledby="<?=$cart['product_title'];?>" />
					</div>
						</td>

					<td class="product-subtotal" data-title="Total">
						<span class="woocommerce-Price-amount amount">
							<span data-val="<?=$cart['price']*$cart['qty'];?>" class="woocommerce-Price-calc"><?=$cart['price']*$cart['qty'];?></span>
							<span class="woocommerce-Price-currencySymbol">֏</span>
						</span>
					</td>

				</tr>
				<?php $totalPrice += $cart['price']*$cart['qty']; endforeach; ?>
					<tr>
						<td colspan="6">🔴 Նշեք Ձեր նախընտրելի վճարման տարբերակը։</td>
					</tr>
					<tr>
						<td colspan="6">
							<select
							class="trx_addons_attrib_button"
							id="pay_type"
							style="display:none;"
							name="attribute_pay_type"
							data-attribute_name="attribute_pay_type"
							data-show_option_none="yes">
								<option value="0" >Առձեռն</option>
								<option value="1" >Իդրամ</option>
								<option value="2" >Տերմինալ</option>
							</select>
							<div
								id="pay_type_attrib_extended"
								class="pay_type_attrib_extended trx_addons_attrib_extended"
								data-attrib="pay_type">
								<span
									class="trx_addons_attrib_item trx_addons_attrib_selected trx_addons_attrib_button trx_addons_tooltip"
									data-value="0"
									data-tooltip="Վճարել Կանխիկ">
									<span style="text-align:center;">
										<img src="<?=Url::base(true);?>/image/cash-delivery.png"><br>Առձեռն</span>
								</span>
									<span
										class="trx_addons_attrib_item trx_addons_attrib_button trx_addons_tooltip"
										data-value="1"
										data-tooltip="Վճարել Իդրամով">
										<span style="text-align:center;">
											<img src="<?=Url::base(true);?>/image/idram-logo.png"><br>Իդրամ</span>
									</span>
									<span
										class="trx_addons_attrib_item trx_addons_attrib_button trx_addons_tooltip"
										data-value="2"
										data-tooltip="Վճարել Տերմինալով">
											<span style="text-align:center;"><img src="<?=Url::base(true);?>/image/TelCell.jpg"><br>Տերմինալ</span>
									</span>
									</div>
								</td>
					</tr>

			<!-- <tr>
				<td colspan="6" class="actions">

											<div class="coupon">
							<label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" /> <button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
													</div>

					<button type="submit" class="button" name="update_cart" value="Update cart">Update cart</button>


					<input type="hidden" id="woocommerce-cart-nonce" name="woocommerce-cart-nonce" value="b30070024a" /><input type="hidden" name="_wp_http_referer" value="/cart/" />				</td>
			</tr> -->



					</tbody>
	</table>

	<div class="cart-collaterals">
		<div class="cart_totals ">


			<h2>Ընդհանուր տվյալներ</h2>

			<table cellspacing="0" class="shop_table shop_table_responsive">

				<tbody>
				<tr class="woocommerce-shipping-totals shipping">
					<th>Առաքում</th>
					<td data-title="Shipping">
						Անվճար
					</td>
				</tr>
				<tr class="order-total">
				<th>Ընդհանուր</th>
				<td data-title="Total"><strong><span class="total-price"><?=$totalPrice;?> </span><span class="woocommerce-Price-currencySymbol">֏</span></strong> </td>
				</tr>


				</tbody>
			</table>

		<div class="wc-proceed-to-checkout">

		<a href="http://heartstar.axiomthemes.com/checkout/" class="checkout-button button alt wc-forward sc_button_hover_slide_left sc_button_hover_style_hover">
		Շարունակել</a>
		</div>


		</div>
		
		<div class="form-row place-order">
		<div class="cart_totals ">

	<?php ActiveForm::end(); ?>



</div>
</div>

</div>
	</div><!-- .entry-content -->


</article>
