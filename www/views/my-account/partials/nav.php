<?php
  use yii\helpers\Url;
?>

<nav class="woocommerce-MyAccount-navigation">
	<ul>
					<li class="<?=($this->context->action->id=='index')?'is-active':''?> woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
				<a href="<?=Url::to('/my-account');?>">Վահանակ</a>
			</li>
					<li class="<?=($this->context->action->id=='orders')?'is-active':''?> woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
				<a href="<?=Url::to('/my-account/orders');?>">Պատվերներ</a>
			</li>
			<li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
				<a href="<?=Url::to(['site/logout']);?>">Դուրս Գալ</a>
			</li>
	</ul>
</nav>
