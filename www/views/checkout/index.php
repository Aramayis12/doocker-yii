<?php

use yii\helpers\Html;
use yii\helpers\Url;

$web_path = Yii::getAlias('@web');

$this->registerJsFile($web_path . "/js/zxcvbn-async.min.js");
$this->registerJsFile($web_path . "/js/selectWoo.full.min.js");
$this->registerJsFile($web_path . "/js/password-strength-meter.min.js");
$this->registerJsFile($web_path . "/js/password-strength-meter-3.5.1.min.js");
$this->registerJsFile($web_path . "/js/country-select.min.js");
$this->registerJsFile($web_path . "/js/address-i18n.min.js");
$this->registerJsFile($web_path . "/js/checkout.min.js");
$this->registerJsFile($web_path . "/js/wp-emoji-release.min.js");
$this->registerJsFile($web_path . "/js/zxcvbn.min.js");

Yii::$app->view->params['bodyClass'] = 'page-template-default page page-id-7 custom-background wp-custom-logo ua_chrome woocommerce-checkout woocommerce-page woocommerce-no-js body_tag scheme_default blog_mode_shop is_stream blog_style_excerpt sidebar_show trx_addons_present header_type_custom header_style_header-custom-848 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-5.5.5 vc_responsive'; // body_style_wide sidebar_left
$this->title = 'Հաստատել';
?>

<script type="text/javascript">
	var c = document.body.className;
	c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
	document.body.className = c;
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var wc_checkout_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","update_order_review_nonce":"950954e5df","apply_coupon_nonce":"c50ab3a784","remove_coupon_nonce":"4c9e9d09b3","option_guest_checkout":"yes","checkout_url":"\/?wc-ajax=checkout","is_checkout":"1","debug_mode":"1","i18n_checkout_error":"Error processing checkout. Please try again."};
/* ]]> */
</script>

<script type='text/javascript'>
/* <![CDATA[ */
var wc_password_strength_meter_params = {"min_password_strength":"3","i18n_password_error":"Please enter a stronger password.","i18n_password_hint":"Hint: The password should be at least twelve characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! \" ? $ % ^ & )."};
/* ]]> */
</script>

<br><br>

<article id="post-7" class="post_item_single post_type_page post-7 page type-page status-publish hentry">
	<div class="post_content entry-content">
		<div class="woocommerce">
			<!-- <div class="woocommerce-form-login-toggle">
				<div class="woocommerce-info">Արդեն գրանցված էք մեր կայքում?
					<a href="#" class="showlogin">սեղմեք այստեղ մուտ գործելու համար</a>
				</div>
			</div>
			<form class="woocommerce-form woocommerce-form-login login" method="post" style="display:none;">
				<p>Եթե դուք արդեն գրանցված էք մեր կայքում, լրացրեք ձեր տվյալները ներքևում.
					Եթե դուք նոր էք սկսել օգտվել մեր կայքից, լրացրեք հաջորդ բլոկի տվյալները։.</p>
				<p class="form-row form-row-first">
					<label for="username">էլ. Փոստի հասցե&nbsp;
						<span class="required">*</span>
					</label>
					<input type="text" class="input-text" name="username" id="username" autocomplete="username" />
				</p>
				<p class="form-row form-row-last">
					<label for="password">Գաղտնաբառ&nbsp;
						<span class="required">*</span>
					</label>
					<input class="input-text" type="password" name="password" id="password" autocomplete="current-password" />
				</p>
				<div class="clear"></div>
				<p class="form-row">
					<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="03031a8518" />
					<input type="hidden" name="_wp_http_referer" value="/checkout/" />
					<button type="submit" class="button" name="login" value="Login">Մուտք</button>
					<input type="hidden" name="redirect" value="<?=Url::base(true);?>/checkout/" />
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
						<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
						<span>Հիշել</span>
					</label>
				</p>
				<p class="lost_password">
					<a href="<?=Url::base(true);?>/my-account/lost-password/">Մոռացել եք ձեր գաղտնաբառը?</a>
				</p>
				<div class="clear"></div>
			</form> -->
			<!--
			<div class="woocommerce-form-coupon-toggle">
				<div class="woocommerce-info">
		Have a coupon?
					<a href="#" class="showcoupon">Click here to enter your code</a>
				</div>
			</div>
			<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">
				<p>If you have a coupon code, please apply it below.</p>
				<p class="form-row form-row-first">
					<input type="text" name="coupon_code" class="input-text" placeholder="Coupon code" id="coupon_code" value="" />
				</p>
				<p class="form-row form-row-last">
					<button type="submit" class="button" name="apply_coupon" value="Apply coupon">Apply coupon</button>
				</p>
				<div class="clear"></div>
			</form>
		 -->
			<div class="woocommerce-notices-wrapper"></div>

			<?= Html::beginForm(Url::to(['/checkout']), 'post', [
				'enctype' => 'multipart/form-data',
				'class' => 'checkout woocommerce-checkout',
				'id' => 'checkout-form',
				'name' => 'Orders'
				]) ?>

				<?=Html::hiddenInput('attribute_gift_for', $gift_for);?>
				<?=Html::hiddenInput('attribute_pay_type', $pay_type);?>
				<?=Html::hiddenInput('qty', $qty);?>
				<?=Html::hiddenInput('price', $price);?>

				<div class="col2-set" id="customer_details">
					<div class="col-1">
						<div class="woocommerce-billing-fields">
							<h4>Տվյալների գրանցում</h4>
							<div class="woocommerce-billing-fields__field-wrapper">
								<!-- woocommerce-invalid -->
								<p class="<?=($model->hasErrors('first_name'))?'woocommerce-invalid':''?> form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10">
									<label for="billing_first_name" class="">Անուն&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('text', 'Orders[first_name]', $model->first_name, [
											'class' => 'input-text',
											'id' => 'billing_first_name',
											'autocomplete' => 'given-name'
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('first_name'))?$model->getFirstError('first_name'):''?></span>
								</p>
								<p class="<?=($model->hasErrors('last_name'))?'woocommerce-invalid':''?> form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
									<label for="billing_last_name" class="">Ազգանուն&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('text', 'Orders[last_name]', $model->last_name, [
											'class' => 'input-text',
											'id' => 'billing_last_name',
											'autocomplete' => 'family-name'
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('last_name'))?$model->getFirstError('last_name'):''?></span>
								</p>
								<?php if(!$gift_for):?>

								<p class="<?=($model->hasErrors('address_1'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
									<label for="billing_address_1" class="">Փողոց/տուն&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('text', 'Orders[address_1]', $model->address_1, [
											'class' => 'input-text',
											'id' => 'billing_address_1',
											'autocomplete' => 'address-line1',
											'placeholder' => 'Տան համարը և փողոցի անունը'
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('address_1'))?$model->getFirstError('address_1'):''?></span>
								</p>

								<p class="<?=($model->hasErrors('city'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
									<label for="billing_city" class="">Քաղաք&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('text', 'Orders[city]', $model->city, [
											'class' => 'input-text',
											'id' => 'billing_city',
											'autocomplete' => 'address-level2',
											'placeholder' => ''
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('city'))?$model->getFirstError('city'):''?></span>
								</p>

								<p class="<?=($model->hasErrors('age'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
									<label for="billing_city" class="">Տարիք&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('text', 'Orders[age]', $model->age, [
											'class' => 'input-text',
											'id' => 'billing_age',
											'autocomplete' => 'age',
											'placeholder' => ''
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('age'))?$model->getFirstError('age'):''?></span>
								</p>

								<?php endif; ?>
								<p class="<?=($model->hasErrors('phone'))?'woocommerce-invalid':''?> form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100">
									<label for="billing_phone" class="">Հեռախոս&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::input('tel', 'Orders[phone]', $model->phone, [
											'class' => 'input-text',
											'id' => 'billing_phone',
											'autocomplete' => 'tel',
											'placeholder' => ''
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('phone'))?$model->getFirstError('phone'):''?></span>
								</p>

								<p class="<?=($model->hasErrors('email'))?'woocommerce-invalid':''?> form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110">
									<label for="billing_email" class="">էլ. Փոստի հասցե&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<?php
										$disabled = (!Yii::$app->getUser()->isGuest)?true:false;

										echo Html::input('email', 'Orders[email]', $model->email, [
											'class' => 'input-text',
											'id' => 'billing_email',
											'autocomplete' => 'email username',
											'placeholder' => '',
											'disabled' => $disabled
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('email'))?$model->getFirstError('email'):''?></span>
								</p>

								<?php if(!$gift_for):?>
								<p class="<?=($model->hasErrors('interests'))?'woocommerce-invalid':''?> form-row form-row-wide notes" id="order_comments_field" data-priority="">
									<label for="order_comments" class="">Հետաքրքրություններ&nbsp;
										<span class="optional">(Ոչ պարտադիր)</span>
									</label>
									<span class="woocommerce-input-wrapper">
										<?= Html::textarea('Orders[interests]', $model->interests, [
											'class' => 'input-text',
											'id' => 'order_comments',
											'placeholder' => 'Նշեք թե ինչ առիթով եք ցանկանում ստանալ նվեր։ Ինչպես նաև ձեր մասին մինիմալ տեղեկություններ՝ նախասիրությունների📚,մասնագիտության (եթե արդեն ունեք)📘, հոբբիների մասին🎧🎨🎭,որպեսզի նվերը էլ ավելի հաճելի և սպասված լինի',
											'rows' => '2',
											'cols' => '5',
											]) ?>
									</span>
									<spam class='error-msg'><?=($model->hasErrors('interests'))?$model->getFirstError('interests'):''?></span>
								</p>
							<?php endif; ?>


							</div>
						</div>
						<!-- <div class="woocommerce-account-fields">
							<p class="form-row form-row-wide create-account">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount"  type="checkbox" name="createaccount" value="1" />
									<span>Ցանկանում էք գրանցվել մեր կայքում?</span>
								</label>
							</p>
							<div class="create-account" style="display: none;">
								<p class="form-row validate-required" id="account_password_field" data-priority="">
									<label for="account_password" class="">Create account password&nbsp;
										<abbr class="required" title="required">*</abbr>
									</label>
									<span class="woocommerce-input-wrapper">
										<input type="password" class="input-text " name="account_password" id="account_password" placeholder="Password"  value=""  />
									</span>
								</p>
								<div class="clear"></div>
							</div>
						</div> -->
					</div>
					<?php if($gift_for):?>
						<div class="col-2">
							<div class="woocommerce-shipping-fields">
								<h4 id="ship-to-different-address">Ստացողի տվյալները</h4>
								<div class="shipping_address">
									<div class="woocommerce-shipping-fields__field-wrapper">
										<p class="<?=($model->hasErrors('recipient_first_name'))?'woocommerce-invalid':''?> form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
											<label for="shipping_first_name" class="">Անուն&nbsp;
												<abbr class="required" title="required">*</abbr>
											</label>
											<span class="woocommerce-input-wrapper">
												<?= Html::input('text', 'Orders[recipient_first_name]', $model->recipient_first_name, [
													'class' => 'input-text',
													'id' => 'billing_recipient_first_name',
													'autocomplete' => 'given-name'
													]) ?>
											</span>
											<spam class='error-msg'><?=($model->hasErrors('recipient_first_name'))?$model->getFirstError('recipient_first_name'):''?></span>
										</p>
										<p class="<?=($model->hasErrors('recipient_last_name'))?'woocommerce-invalid':''?> form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
											<label for="shipping_last_name" class="">Ազգանուն&nbsp;
												<abbr class="required" title="required">*</abbr>
											</label>
											<span class="woocommerce-input-wrapper">
												<?= Html::input('text', 'Orders[recipient_last_name]', $model->recipient_last_name, [
													'class' => 'input-text',
													'id' => 'shipping_last_name',
													'autocomplete' => 'family-name'
													]) ?>
											</span>
											<spam class='error-msg'><?=($model->hasErrors('recipient_last_name'))?$model->getFirstError('recipient_last_name'):''?></span>
										</p>

										<p class="<?=($model->hasErrors('recipient_address_1'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
											<label for="shipping_address_1" class="">Փողոց/տուն&nbsp;
												<abbr class="required" title="required">*</abbr>
											</label>
											<span class="woocommerce-input-wrapper">
												<?= Html::input('text', 'Orders[recipient_address_1]', $model->recipient_address_1, [
													'class' => 'input-text',
													'id' => 'shipping_address_1',
													'autocomplete' => 'address-line1',
													'placeholder' => 'Տան համարը և փողոցի անունը'
													]) ?>
											</span>
											<spam class='error-msg'><?=($model->hasErrors('recipient_address_1'))?$model->getFirstError('recipient_address_1'):''?></span>
										</p>

										<p class="<?=($model->hasErrors('recipient_age'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70">
											<label for="billing_city" class="">Տարիք&nbsp;
												<abbr class="required" title="required">*</abbr>
											</label>
											<span class="woocommerce-input-wrapper">
												<?= Html::input('text', 'Orders[recipient_age]', $model->recipient_age, [
													'class' => 'input-text',
													'id' => 'shipping_age',
													'autocomplete' => 'age',
													'placeholder' => ''
													]) ?>
											</span>
											<spam class='error-msg'><?=($model->hasErrors('recipient_age'))?$model->getFirstError('recipient_age'):''?></span>
										</p>

										<p class="<?=($model->hasErrors('recipient_city'))?'woocommerce-invalid':''?> form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70">
											<label for="shipping_city" class="">Քաղաք&nbsp;
												<abbr class="required" title="required">*</abbr>
											</label>
											<span class="woocommerce-input-wrapper">
												<?= Html::input('text', 'Orders[recipient_city]', $model->recipient_city, [
													'class' => 'input-text',
													'id' => 'shipping_city',
													'autocomplete' => 'address-level2',
													'placeholder' => ''
													]) ?>
											</span>
											<spam class='error-msg'><?=($model->hasErrors('recipient_city'))?$model->getFirstError('recipient_city'):''?></span>
										</p>


									</div>
								</div>
							</div>
							<div class="woocommerce-additional-fields">
								<div class="woocommerce-additional-fields__field-wrapper">
									<p class="<?=($model->hasErrors('recipient_interests'))?'woocommerce-invalid':''?> form-row notes" id="order_comments_field" data-priority="">
										<label for="order_comments" class="">Հետաքրքրություններ&nbsp;
											<span class="optional">(Ոչ պարտադիր)</span>
										</label>
										<span class="woocommerce-input-wrapper">
											<?= Html::textarea('Orders[recipient_interests]', $model->recipient_interests, [
												'class' => 'input-text',
												'id' => 'order_comments',
												'placeholder' => 'Նշեք թե ինչ առիթով եք ցանկանում կատարել նվեր։ Ինչպես նաև նվեր ստացողի մասին մինիմալ տեղեկություններ՝ նախասիրությունների📚,մասնագիտության (եթե արդեն ունի)📘, հոբբիների մասին🎧🎨🎭,որպեսզի նվերը էլ ավելի հաճելի և սպասված լինի',
												'rows' => '2',
												'cols' => '5',
												]) ?>
										</span>
										<spam class='error-msg'><?=($model->hasErrors('recipient_interests'))?$model->getFirstError('recipient_interests'):''?></span>
									</p>
								</div>
							</div>
						</div>
					<?php endif;?>

				</div>
				<div class="col2-set">
					<h4>Առաքման Ժամանակը</h4>
					<div class="col-1">
						<p class="<?=($model->hasErrors('month'))?'woocommerce-invalid':''?> form-row form-row-first validate-required" id="billing_month_field" data-priority="120">
							<label for="billing_month" class="">Ամիս&nbsp;
								<abbr class="required" title="required">*</abbr>
							</label>
							<span class="woocommerce-input-wrapper">
								<?php
										$months = array(
											1 => 'Հունվար',
											2 => 'Փետրվար.',
											3 => 'Մարտ',
											4 => 'Ապրիլ',
											5 => 'Մայիս',
											6 => 'Հունիս',
											7 => 'Հուլիս',
											8 => 'Օգոստոս',
											9 => 'Սեպտեմբեր',
											10 => 'Հոկտեմբեր',
											11 => 'Նոյեմբեր',
											12 => 'ԴԵկտեմբեր'
										);

										echo Html::activeDropDownList($model, 'month',$months, [
											'class' => 'input-text',
											'id' => 'billing_month',
											'autocomplete' => 'month',
											'name' => 'Orders[month]'
										]) ;
								?>

							</span>
							<spam class='error-msg'><?=($model->hasErrors('month'))?$model->getFirstError('month'):''?></span>
						</p>
						<p class="<?=($model->hasErrors('day'))?'woocommerce-invalid':''?> form-row form-row-last validate-required" id="billing_day_field" data-priority="130">
							<label for="billing_day" class="">Օր&nbsp;
								<abbr class="required" title="required">*</abbr>
							</label>
							<span class="woocommerce-input-wrapper">
								<?php
									$days = [
										1 => 1,
										2 => 2,
										3 => 3,
										4 => 4,
										5 => 5,
										6 => 6,
										7 => 7,
										8 => 8,
										9 => 9,
										10 => 10,
										11 => 11,
										12 => 12,
										13 => 13,
										14 => 14,
										15 => 15,
										16 => 16,
										17 => 17,
										18 => 18,
										19 => 19,
										20 => 20,
										21 => 21,
										22 => 22,
										23 => 23,
										24 => 24,
										25 => 25,
										26 => 26,
										27 => 27,
										28 => 28,
										29 => 29,
										30 => 30,
										30 => 30,
										31 => 31,
									];
									echo Html::activeDropDownList($model, 'day',$days, [
									'class' => 'input-text',
									'id' => 'billing_day',
									'autocomplete' => 'day',
									'name' => 'Orders[day]'
								]) ; ?>
							</span>
							<spam class='error-msg'><?=($model->hasErrors('day'))?$model->getFirstError('day'):''?></span>
						</p>
					</div>
					<div class="col-2">

						<p class="<?=($model->hasErrors('time'))?'woocommerce-invalid':''?>  form-row form-row-wide validate-required" id="billing_day_field" data-priority="130">
							<label for="billing_day" class="">Ժամ&nbsp;
								<abbr class="required" title="required">*</abbr>
							</label>
							<span class="woocommerce-input-wrapper">
								<?php
									// 9-17 hours, stepped every 30 mins, formatted as hh:mm
									$times = [
									    '08:00 - 11:00' => '08:00 - 11:00',
									    '11:00 - 14:00' => '11:00 - 14:00',
									    '14:00 - 17:00' => '14:00 - 17:00',
									    '17:00 - 20:00' => '17:00 - 20:00',
									    '20:00 - 23:00' => '20:00 - 23:00',
									];

									echo Html::activeDropDownList($model, 'time',$times, [
									'class' => 'input-text',
									'id' => 'billing_time',
									'autocomplete' => 'time',
									'name' => 'Orders[time]'
								]) ; ?>
							</span>
							<spam class='error-msg'><?=($model->hasErrors('time'))?$model->getFirstError('time'):''?></span>
						</p>
					</div>
				</div>
				<h4 id="order_review_heading">Ձեր պատվերը</h4>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<table class="shop_table">
						<thead>
							<tr>
								<th class="product-name">Անուն*ք</th>
								<th class="product-price">Միավոր Գին</th>
								<th class="product-total">Ընդհանուր</th>
							</tr>
						</thead>
						<tbody>
							<tr class="cart_item">
								<td class="product-name">
								<?=$product->title?>&nbsp;
									<strong class="product-quantity">&times; <?=$qty?></strong>
								</td>
								<td class="product-total">
									<span class="woocommerce-Price-amount amount">
										<?=$price?> <span class="woocommerce-Price-currencySymbol">֏</span>
									</span>
								</td>
								<td class="product-total">
									<span class="woocommerce-Price-amount amount">
										<?=($price*$qty)?> <span class="woocommerce-Price-currencySymbol">֏</span>
									</span>
								</td>
							</tr>
						</tbody>

					</table>
					<div >

						<div class="form-row place-order">



							<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Place order" data-value="Place order">Առաքել</button>

						</div>
					</div>
				</div>
			<?= Html::endForm() ?>
		</div>
	</div>
	<!-- .entry-content -->
</article>
