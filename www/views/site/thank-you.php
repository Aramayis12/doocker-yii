<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Ընդունված է';
$this->params['breadcrumbs'][] = $this->title;
?>

<article class="post_item_single post_item_thanks post-0 unknown type-unknown status-publish hentry">
	<div class="post_content">

		<div class="page_info">
			<h3 class="page_subtitle">Շնորհակալություն</h3>
			<p class="page_description">Մենք ուրախությամբ տեղեկացնում ենք ձեզ, որ
        պատվերը ընդունված է, <br>դուք կտեղեկանաք մնացածի մասին ձեր էլ․ փոստի միջոցով։</p>
			<a href="<?=Url::home()?>" class="go_home theme_button sc_button_hover_slide_left">Գլխավոր</a>
		</div>
	</div>
</article>

<script type="text/javascript">
    document.cookie = "utm_source=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
</script>
