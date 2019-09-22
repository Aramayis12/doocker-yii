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
				<!-- <th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th> -->
				<th class="product-name">Անվանում</th>
				<th class="product-price">Գին</th>
				<th class="product-quantity">Քանակ</th>
				<th class="product-subtotal">Ընդհանուր</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td  colspan="6">
					<span>🔴 Նշեք Ձեր գրպանին հարմար գումարի մոտավոր չափը</span>
				</td>
			</tr>


								<tr class="woocommerce-cart-form__cart-item cart_item">

						<!-- <td class="product-remove">
							<a href="<?=Url::base(true);?>/cart/?remove_item=af92f2820ffa77080e73d17d24b44df4&#038;_wpnonce=b30070024a" class="remove" aria-label="Remove this item" data-product_id="293" data-product_sku="">&times;</a>						</td>

						<td class="product-thumbnail">
						<a href="<?=Url::base(true);?>/product/<?=$product->slug?>?attribute_pa_volume=250"><img width="300" height="300" src="<?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-300x300.png" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="<?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-300x300.png 300w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-90x90.png 90w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-760x760.png 760w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-370x370.png 370w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-150x150.png 150w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-768x768.png 768w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2-600x600.png 600w, <?=Url::base(true);?>/wp-content/uploads/2017/10/product-2.png 1000w" sizes="(max-width: 300px) 100vw, 300px" /></a>						</td>
					-->

						<td class="product-name" data-title="Product">
							<!-- <a href="<?=Url::base(true);?>/product/<?=$product->slug?>?attribute_pa_volume=250">Red Lunch Box - 250</a>-->
							<?=$model->title?>
						</td>

						<td class="product-price" data-title="Price">
							<select name="price" value="4499" id="price_input" class="input-text">
									<?php $cost = 4490; do { ?>
										<option value="<?=$cost?>"><?=$cost?> <span class="woocommerce-Price-currencySymbol">֏</span></option>
									<?php $cost+=500; } while($cost < 10000); ?>
							</select>

						</td>

						<td class="product-quantity" data-title="Quantity">
							<div class="quantity">
		<label class="screen-reader-text" for="quantity_5c7fb2968236c">Quantity</label>
		<input
			type="number"
			id="quantity_input"
			class="input-text qty text"
			step="1"
			min="0"
			max=""
			name="qty"
			value="1"
			title="Qty"
			size="4"
			pattern="[0-9]*"
			inputmode="numeric"
			aria-labelledby="Red Lunch Box - 250 quantity" />
	</div>
							</td>

						<td class="product-subtotal" data-title="Total">
							<span class="woocommerce-Price-amount amount">
								<span data-val="4499" class="woocommerce-Price-calc">4499</span>
								<span class="woocommerce-Price-currencySymbol">֏</span>
							</span>
						</td>

					</tr>
					<tr>
						<td colspan="6">🔴 Նշեք, թե ով է նվերի հասցեատերը</td>
					</tr>
					<tr>
						<td colspan="6" class="gift_for">
							<select
							class="trx_addons_attrib_button"
							id="gift_for"
							style="display:none;"
							name="attribute_gift_for"
							data-attribute_name="attribute_gift_for"
							data-show_option_none="yes">
								<option value="0" >Ինձ համար</option>
								<option value="1" >Նվեր է</option>
							</select>
							<div
								id="gift_for_attrib_extended"
								class="gift_for_attrib_extended trx_addons_attrib_extended"
								data-attrib="gift_for">
									<span
										class="trx_addons_attrib_item trx_addons_attrib_button trx_addons_attrib_selected trx_addons_tooltip"
										data-value="0"
										data-tooltip="Ինձ Համար">
										<span>Ինձ Համար</span>
									</span>
									<span
										class="trx_addons_attrib_item trx_addons_attrib_button trx_addons_tooltip"
										data-value="1"
										data-tooltip="Նվեր Ուրիշին">
											<span>Նվեր Ուրիշին</span>
									</span>
									</div>
								</td>
					</tr>
					<tr>
						<td colspan="6">🔴 Նշեք վճարման տարբերակը։</td>
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

	<div id="payment" class="cart-collaterals">
		<ul class="wc_payment_methods payment_methods methods">
			<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">
				Առաքումն անվճար է։
			</li>
		</ul>
		<div class="form-row place-order">
		<div class="cart_totals ">

		<div class="wc-proceed-to-checkout">
			<button type='submit' style="width: 100%" class="cart-button button alt wc-forward">
		Շարունակել</button>
	</div>

	<?php ActiveForm::end(); ?>



</div>
</div>

</div>
	</div><!-- .entry-content -->


</article>
