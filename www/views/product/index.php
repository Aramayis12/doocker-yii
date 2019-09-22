<script type='text/javascript'>
/* <![CDATA[ */
var wpgdprcData = {};
/* ]]> */
</script>
<?php
    use yii\helpers\Url;
    use yii\helpers\Html;

	// CSS
	$this->registerCssFile("@web/css/sb-instagram.min.css");
	$this->registerCssFile("@web/css/photoswipe.css");
	$this->registerCssFile("@web/css/default-skin.css");

	// JS
	$this->registerJsFile("@web/js/jquery.zoom.min.js");
	$this->registerJsFile("@web/js/jquery.flexslider-min.js");
	$this->registerJsFile("@web/js/photoswipe.min.js");
	$this->registerJsFile("@web/js/photoswipe-ui-default.min.js");
	$this->registerJsFile("@web/js/single-product.min.js");
	$this->registerJsFile("@web/js/comment-reply.min.js");

	$this->registerJsFile("@web/js/underscore.min.js");
	$this->registerJsFile("@web/js/wp-util.min.js");
	$this->registerJsFile("@web/js/add-to-cart-variation.min.js");
    $this->registerJsFile("@web/js/front.js");

    $this->registerJsFile("@web/js/wp-emoji-release.min.js");
    //

    Yii::$app->view->params['bodyClass'] = 'product-template-default single single-product postid-289 custom-background wp-custom-logo ua_chrome woocommerce woocommerce-page woocommerce-no-js body_tag scheme_default blog_mode_shop body_style_wide  is_stream blog_style_excerpt sidebar_hide expand_content trx_addons_present header_type_custom header_style_header-custom-848 header_position_default menu_style_top no_layout wpb-js-composer js-comp-ver-6.0.5 vc_responsive';

    $this->title = $model->title;
?>


                        <article class="post_item_single post_type_product">
                            <nav class="woocommerce-breadcrumb"><a href="http://specialgifts.am">Home</a>&nbsp;&#47;&nbsp;<a href="<?=Url::base(true);?>/product-category/party-gifts/">Party Gifts</a>&nbsp;&#47;&nbsp;Coffee Mug</nav>


                            <?php if($isCartAdded): ?>
                                <div class="woocommerce-notices-wrapper">
                                    <div class="woocommerce-message" role="alert">
                                        <a href="http://heartstar.axiomthemes.com/cart/" tabindex="1" class="button wc-forward sc_button_hover_slide_left sc_button_hover_style_alter">Նայել զամբյուղը</a>
                                        <span><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?=$isCartAdded->qty;?> × “Red Lunch Box”֊ը հաջողությամբ ավելացված է Ձեր զամբյուղում.</span>
                                    </div>
                                </div>
                            <?php endif; ?>



                            <div id="product-296" class="post-296 product type-product status-publish has-post-thumbnail product_cat-accessories product_cat-funny-gifts product_cat-party-gifts product_tag-gift product_tag-kids product_tag-shopping product_tag-unique first instock shipping-taxable purchasable product-type-variable has-default-attributes">

                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                                    <figure class="woocommerce-product-gallery__wrapper">
                                        <div data-thumb="<?=Yii::getAlias('@web/') . $model->image;?>" class="woocommerce-product-gallery__image">
                                            <a href="<?=Yii::getAlias('@web/') . $model->image;?>">
                                            <img
                                            width="600"
                                            height="600"
                                            src="<?=Yii::getAlias('@web/') . $model->image;?>" class="wp-post-image"
                                            alt=""
                                            title="product-1"
                                            data-caption=""
                                            data-src="<?=Yii::getAlias('@web/') . $model->image;?>"
                                            data-large_image="<?=Yii::getAlias('@web/') . $model->image;?>"
                                            data-large_image_width="1000"
                                            data-large_image_height="1000"
                                            srcset="<?=Yii::getAlias('@web/') . $model->image;?> 600w, <?=Yii::getAlias('@web/') . $model->image;?> 90w, <?=Yii::getAlias('@web/') . $model->image;?> 760w, <?=Yii::getAlias('@web/') . $model->image;?> 370w, <?=Yii::getAlias('@web/') . $model->image;?> 150w,<?=Yii::getAlias('@web/') . $model->image;?> 300w, <?=Yii::getAlias('@web/') . $model->image;?> 768w, <?=Yii::getAlias('@web/') . $model->image;?> 1000w" sizes="(max-width: 600px) 100vw, 600px" /></a>
                                        </div>
                                    </figure>
                                </div>

                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title"><?=$model->title;?></h1>
                                    <div class="woocommerce-product-rating">
                                        <!-- <div class="star-rating"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">1</span> customer rating</span>
                                        </div>  -->
                                                                      </div>

                                    <p class="price">
                                    <span class="woocommerce-Price-amount amount">
                                                                                        <?=$model->price;?>
                                                                                        <span class="woocommerce-Price-currencySymbol">֏</span>
                                                                                    </span>
                                                                                    </p>
                                    <div class="woocommerce-product-details__short-description">
                                        <p><?=$model->description;?></p>
                                    </div>

                                    <?= Html::beginForm([Url::to('/product/' . $model->slug)], 'post', [
                                        'enctype' => 'multipart/form-data',
                                        'class' => 'variations_form cart'
                                        ]) ?>
                                        <!-- <table class="variations" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="label">
                                                        <label for="pa_color">color</label>
                                                    </td>
                                                    <td class="value">
                                                        <select class="trx_addons_attrib_color" style="display:none;" id="pa_color" class="" name="attribute_pa_color" data-attribute_name="attribute_pa_color" data-show_option_none="yes">
                                                            <option value="">Choose an option</option>
                                                            <option value="purple">purple</option>
                                                            <option value="red">red</option>
                                                            <option value="yellow">yellow</option>
                                                        </select>
                                                        <div id="pa_color_attrib_extended" class="pa_color_attrib_extended trx_addons_attrib_extended" data-attrib="pa_color"><span class="trx_addons_attrib_item trx_addons_attrib_color trx_addons_tooltip trx_addons_attrib_selected" data-value="" data-tooltip="Choose an option"><span></span></span><span class="trx_addons_attrib_item trx_addons_attrib_color trx_addons_tooltip" data-value="purple" data-tooltip="purple"><span style="background-color:purple;"></span></span><span class="trx_addons_attrib_item trx_addons_attrib_color trx_addons_tooltip" data-value="red" data-tooltip="red"><span style="background-color:red;"></span></span><span class="trx_addons_attrib_item trx_addons_attrib_color trx_addons_tooltip" data-value="yellow" data-tooltip="yellow"><span style="background-color:yellow;"></span></span>
                                                        </div><a class="reset_variations" href="#">Clear</a> </td>
                                                </tr>
                                            </tbody>
                                        </table> -->

                                        <div class="single_variation_wrap">
                                            <div class="woocommerce-variation single_variation"></div>
                                            <div class="woocommerce-variation-add-to-cart variations_button">

                                                <div class="quantity">
                                                    <label class="screen-reader-text" for="quantity_5c796b248f2cc">Quantity</label>
                                                    <?= Html::input('number', 'Cart[qty]', $cart->qty, [
                                                        'class' => 'input-text qty text',
                                                        'step' => '1',
                                                        'min' => '1',
                                                        'max' => '',
                                                        'title' => 'Qty',
                                                        'size' => '4',
                                                        'pattern' => '[0-9]*',
                                                        'inputmode' => 'numeric',
                                                        'aria-labelledby' => ''
                                                    ]) ?>
                                                    <!-- <input type="number" id="quantity_5c796b248f2cc" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="" /> -->
                                                </div>

                                                <input type="hidden" name="Cart[product_id]" value="<?=$model->id?>" />
                                                <input type="hidden" name="Cart[price]" value="<?=$model->price?>" />

                                                <?= Html::submitButton('Գնել', ['class' => 'single_add_to_cart_button button alt']) ?>

                                
                                            </div>
                                        </div>

                                    <?= Html::endForm() ?>

                                    <div class="product_meta">

                                        <span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>

                                        <span class="posted_in">Categories: <a href="<?=Url::base(true);?>/product-category/accessories/" rel="tag">Accessories</a>, <a href="<?=Url::base(true);?>/product-category/funny-gifts/" rel="tag">Funny Gifts</a>, <a href="<?=Url::base(true);?>/product-category/party-gifts/" rel="tag">Party Gifts</a></span>
                                        <span class="tagged_as">Tags: <a href="<?=Url::base(true);?>/product-tag/gift/" rel="tag">gift</a>, <a href="<?=Url::base(true);?>/product-tag/kids/" rel="tag">kids</a>, <a href="<?=Url::base(true);?>/product-tag/shopping/" rel="tag">shopping</a>, <a href="<?=Url::base(true);?>/product-tag/unique/" rel="tag">unique</a></span>
                                        <span class="product_id">Product ID: <span><?=$model->id;?></span></span>
                                    </div>
                                </div>

                                <div class="woocommerce-tabs wc-tabs-wrapper"></div>

                                <section class="related products">

                                    <h2>Related products</h2>

                                    <ul class="products columns-3">

                                        <?php foreach($products as $product): ?>
                                        <li class="post-293 product type-product status-publish has-post-thumbnail product_cat-funny-gifts product_cat-gadjets product_cat-party-gifts product_tag-fun product_tag-happy product_tag-popular product_tag-surprise product_tag-universal first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                                            <div class="post_item post_layout_thumbs">
                                                <div class="post_featured hover_shop">
                                                    <a href="<?=Url::base(true);?>/product/<?=$product->slug?>">
                                                    <img width="300" height="300" 
                                                    src="<?=Yii::getAlias('@web/') . $product->image;?>" 
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" 
                                                    srcset="<?=Yii::getAlias('@web/') . $product->image;?> 300w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 90w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 760w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 370w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 150w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 768w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 600w, 
                                                    <?=Yii::getAlias('@web/') . $product->image;?> 1000w" 
                                                    sizes="(max-width: 300px) 100vw, 300px">
                                                        </a>
                                                    <div class="mask"></div>
                                                    <div class="icons">
                                                        <a href="<?=Url::base(true);?>/product/<?=$product->slug?>" aria-hidden="true" class="shop_link button icon-link"></a>
                                                        <a rel="nofollow" href="<?=Url::base(true);?>/product/<?=$product->slug?>" aria-hidden="true" data-quantity="1" data-product_id="293" data-product_sku="" class="shop_cart icon-cart-2 button add_to_cart_button product_type_variable product_in_stock">Add to cart</a> </div>
                                                </div>
                                                <!-- /.post_featured -->
                                                <div class="post_data">
                                                    <div class="post_data_inner">
                                                        <div class="post_header entry-header">
                                                            <h2 class="woocommerce-loop-product__title"><a href="<?=Url::base(true);?>/product/<?=$product->slug?>"><?=$product->title;?></a></h2> </div>
                                                        <!-- /.post_header -->

                                                        <span class="price">
                                                                                    <span class="woocommerce-Price-amount amount">
                                                                                        <?=$product->price;?>
                                                                                        <span class="woocommerce-Price-currencySymbol">֏</span>
                                                                                    </span>
                                                                                </span>
                                                        <a href="<?=Url::base(true);?>/product/<?=$product->slug?>" data-quantity="1" class="button product_type_variable add_to_cart_button" data-product_id="293" data-product_sku="" aria-label="Select options for &ldquo;Red Lunch Box&rdquo;" rel="nofollow">Buy now</a> </div>
                                                    <!-- /.post_data_inner -->
                                                </div>
                                                <!-- /.post_data -->
                                            </div>
                                            <!-- /.post_item -->
                                        </li>
                                        <?php endforeach; ?>

                                    </ul>

                                </section>

                            </div>

                        </article>
                        <!-- /.post_item_single -->
