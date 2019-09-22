<?php
	use yii\helpers\StringHelper;
	use \yii\helpers\Url;
	use \yii\helpers\Html;
	use yii\widgets\LinkPager;

	/* @var $this yii\web\View */
	/* @var $text common\models\TextBlock */
	/* @var $request common\models\Request */

	$this->registerCss('
		.pagination {
			margin: 0px;
			padding: 0px;
			list-style: none;
			text-align: center;
		}

		.pagination > li {
				display: inline-block;
		}

		.pagination > li.active > a {
			color: #fe3c5c;
			background-color: #ededee;
			border-color: #fe3c5c;
			border-bottom: 2px solid;
		}

		.pagination > li >a {
			display: block;
			text-align: center;
			vertical-align: top;
			font-size: inherit;
			font-weight: inherit;
			margin: 0.6667em 0.8em 0 0;
			padding: 0;
			border: none;
			font-weight: bold;
			width: 1.5em;
			height: 1.8em;
			line-height: 2em;
			-webkit-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			-webkit-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			-ms-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			-o-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
		}

		.next, .prev{
			display: block;
			text-indent: 200px;
			overflow: hidden;
			position: relative;
			width: 2em;
			height: 2em;
			text-align: center;
			vertical-align: top;
			font-size: inherit;
			font-weight: inherit;
			margin: 0.6667em 0.8em 0 0;
			padding: 0;
			border: none;
			font-weight: bold;
			line-height: 2em;
			-webkit-border-radius: 0;
			-ms-border-radius: 0;
			border-radius: 0;
			-webkit-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			-ms-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			-o-transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
			transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease, background-position 0.3s ease;
		}

		.next > a, .prev > a {
			color: #372644;
			position: relative;
			margin:0px!important;
			width: 2em!important;
			height: 2em!important;
			border-radius: 50%!important;
    	background-color: #ffffff;
			border-radius: 50%;
		}

		.next > a:before {
		    content: "\e96c";
				font-family: "fontello";
		    position: absolute;
		    z-index: 1;
		    top: 0;
		    left: 0;
		    width: 100%;
		    text-align: center;
		    text-indent: 0;
		}

		.prev > a:before{
				content: "\e96c";
				-o-transform: rotate(180deg);
				-ms-transform: rotate(180deg);
				-moz-transform: rotate(180deg);
				-webkit-transform: rotate(180deg);
				transform: rotate(180deg);
				font-family: "fontello";
				position: absolute;
				z-index: 1;
				top: 0;
				left: 0;
				width: 100%;
				text-align: center;
				text-indent: 0;
		}
	');

	$this->title = Yii::$app->name;
?>

<div class="posts_container columns_wrap columns_padding_bottom">
	<?php foreach ($models as $key => $blog) {
		$blog_text = strip_tags($blog->text);
		$description = StringHelper::truncate($blog_text , 255, '...');
		?>
		<div class="column-1_3">
			<article id="post-173"
			class="post_item post_format_standard post_layout_classic post_layout_classic_3 post-173 post type-post status-publish format-standard has-post-thumbnail hentry category-handmade"
			data-animation="animated fadeInLeftBig normal">
					<?php if($blog->cover_image): ?>
						<div class="post_featured with_thumb hover_icon">
							<img
								width="370" height="208"
								src="<?=Yii::getAlias('@web/uploads/blog') . '/' . $blog->id . '/' . $blog->cover_image;?>"
								class="attachment-heartstar-thumb-med size-heartstar-thumb-med wp-post-image"
								alt="" sizes="(max-width: 370px) 100vw, 370px" />
								<div class="mask">
								</div>
								<div class="icons">
									<a href="<?=Url::to(['/blogs']) . '/' . $blog->slug;?>" aria-hidden="true" class="icon-017-view"></a>
								</div>
						</div>
					<?php endif; ?>
					<div class="post_header entry-header">
						<h4 class="post_title entry-title">
							<a href="<?=Url::to(['/blogs']) . '/' . $blog->slug;?>" rel="bookmark"><?=$blog->title;?></a>
						</h4>
						<div class="post_meta">
							<!-- <a href="<?//=Url::to(['/blogs']) . '/' . $blog->slug;?>" class="post_meta_item post_counters_item post_counters_comments trx_addons_icon-comment">
								<span class="post_counters_number">3</span>
								<span class="post_counters_label">Դիտում</span>
							</a> -->
							<span class="post_meta_item post_date">
								<a href="<?=Url::to(['/blogs']) . '/' . $blog->slug;?>"><?=date("d F Y", strtotime($blog->public_date));?></a>
							</span>
						</div><!-- .post_meta -->
					</div><!-- .entry-header -->

					<div class="post_content entry-content"><div class="post_content_inner ">
						<?=$description?>
						</div>
					</div><!-- .entry-content -->

			</article>
		</div>
	<?php } ?>
</div>

<div class="nav-section">
	<?php

	echo \yii\widgets\LinkPager::widget([
			'pagination' => $pages,
			'options' => [
					'class' => 'navigation pagination'],
			'linkOptions' => ['class' => 'page-link'],
			'nextPageCssClass' => 'next',
			'prevPageCssClass' => 'prev'
		//  'linkContainerOptions' => ['class' => 'page-item'],
	]);

	?>
</div>
