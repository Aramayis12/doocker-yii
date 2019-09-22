<?php
	use \yii\helpers\Url;

	/* @var $this yii\web\View */
	/* @var $text common\models\TextBlock */
	/* @var $request common\models\Request */

	$this->title = $model->title;
?>

<article id="post-91" class="post_item_single post_type_post post_format_ post-91 post type-post status-publish format-standard has-post-thumbnail hentry category-do-it-yourself category-tutorials tag-gifts tag-present tag-trend">
  <?php if($model->cover_image): ?>
  <div class="post_featured">
      <img width="2400" height="1600" src="<?=Yii::getAlias('@web/uploads/blog') . '/' . $model->id . '/' . $model->cover_image;?>" class="attachment-heartstar-thumb-full size-heartstar-thumb-full wp-post-image" alt="" itemprop="url" sizes="(max-width: 2400px) 100vw, 2400px" />
      <!-- attr of img srcset="http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1.jpg 2400w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-760x507.jpg 760w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-370x247.jpg 370w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-300x200.jpg 300w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-768x512.jpg 768w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-1024x683.jpg 1024w, http://heartstar.axiomthemes.com/wp-content/uploads/2017/09/image-1-600x400.jpg 600w" -->
  </div><!-- .post_featured -->
  <?php endif; ?>

  <div class="post_header post_header_single entry-header">
					</div><!-- .post_header -->
			<div class="sc_layouts_title_meta">
        <div class="post_meta">
          <!-- <a href="#"
          class="post_meta_item post_counters_item post_counters_comments trx_addons_icon-comment">
					<span class="post_counters_number">3</span>
					<span class="post_counters_label">Comments</span>
				</a> 						 -->
				<span class="post_meta_item post_date"><a href="javascript::void(0)"><?=date("d F Y", strtotime($model->public_date));?></a></span>
						</div><!-- .post_meta --></div>
            <div class="post_content post_content_single entry-content" itemprop="mainEntityOfPage">
		            <?=$model->text;?>
<div class="post_meta post_meta_single">
  <!-- <span class="post_meta_item post_tags">
    <i class="post_meta_label icon-032-tag"></i>
    <a href="http://heartstar.axiomthemes.com/tag/gifts/" rel="tag">gifts</a> / <a href="http://heartstar.axiomthemes.com/tag/present/" rel="tag">present</a> / <a href="http://heartstar.axiomthemes.com/tag/trend/" rel="tag">trend</a>
  </span> -->
    <span class="post_meta_item post_share">
      <div class="socials_share socials_size_tiny socials_type_block socials_dir_horizontal socials_wrap">
        <span class="social_items">







							</span>
						</div>
					</span>
				</div>
			</div><!-- .entry-content -->


	</article>
