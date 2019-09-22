<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Կապ';
$this->params['breadcrumbs'][] = $this->title;
?>

<article id="post-227" class="post_item_single post_type_page post-227 page type-page status-publish hentry">


	<div class="post_content entry-content">
		<div class="vc_row wpb_row vc_row-fluid custom_row_2 sc_bg_mask_1 shape_divider_top-none shape_divider_bottom-none trx_addons_inline_1119718139">
      <div class="wpb_column vc_column_container vc_col-sm-5 sc_layouts_column_icons_position_left">
        <div class="vc_column-inner">
          <div class="wpb_wrapper">
            <div class="vc_empty_space"   style="height: 6.5em" >
              <span class="vc_empty_space_inner"></span>
            </div>
            <div id="sc_title_1082727193" class="sc_title sc_title_default">
              <h4 class="sc_item_title sc_title_title sc_align_left sc_item_title_style_default sc_item_title_tag"><?=$this->title;?></h4>
              <div class="sc_item_descr sc_title_descr sc_align_left">
                  <p>Եթե դուք ունեք բիզնես առաջարկներ կամ այլ հարցեր, խնդրում ենք լրացրեք բոլոր դաշտերը մեզ հետ կապվելու համար։
                  Շնորհակալություն։</p>
              </div>
            </div><!-- /.sc_title -->
            <div id="widget_contacts_562270556" class="widget_area sc_widget_contacts vc_widget_contacts wpb_content_element">
              <aside id="widget_contacts_562270556_widget" class="widget widget_contacts">
                <div class="contacts_wrap">
                  <div class="contacts_info">
                    <span class="contacts_phone">
                      <a href="tel:9091234567">(091) 749904</a>
                    </span>
                    <span class="contacts_email">
                      <a href="mailto:info@specialgifts.am">info@specialgifts.am</a>
                    </span>
                    <!-- <span class="contacts_address">Heartstar 3245 Hearts Ave, Longwood, CA 91710</span> -->
                  </div>
                </div><!-- /.contacts_wrap -->
              </aside>
            </div>
          </div>
        </div>
      </div>
      <div class="wpb_column vc_column_container vc_col-sm-7 sc_layouts_column_icons_position_left">
        <div class="vc_column-inner vc_custom_1530106615263">
          <div class="wpb_wrapper">
            <div class="vc_empty_space"   style="height: 6.5em" >
              <span class="vc_empty_space_inner"></span>
            </div>

            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                <div class="sc_form_form">
                    Շնորհակալություն ենք հայտնում մեզ հետ կապվելու համար. Մենք ձեզ կպատասխանենք որքան հնարավոր է շուտ.
                </div>

            <?php else: ?>
            <div id="sc_form_1161991292"	class="sc_form sc_form_default sc_align_Default">
                <?= Html::beginForm(Url::to(['/contact']), 'post', [
                  'class' => 'sc_form_form',
                  'name' => 'ContactForm'
                  ]) ?>
                <div class="sc_form_details trx_addons_columns_wrap">
                  <div class="trx_addons_column-1_2">
                    <label class="sc_form_field sc_form_field_name sc_form_field_text required">
                      <span class="sc_form_field_wrap">
                        <?= Html::input('text', 'ContactForm[name]', $model->name, [
													'aria-required' => 'true',
													'id' => 'name_558549494',
													'placeholder' => 'Ձեր անունը'
													]) ?>
                        </span>
                        <spam class='error-msg'><?=($model->hasErrors('name'))?$model->getFirstError('name'):''?></span>
                      </label>
                    </div>
                    <div class="trx_addons_column-1_2">
                      <label class="sc_form_field sc_form_field_email sc_form_field_text required">
                        <span class="sc_form_field_wrap">
                          <?= Html::input('text', 'ContactForm[email]', $model->email, [
  													'aria-required' => 'true',
  													'id' => 'email_1455127033',
  													'placeholder' => 'Ձեր Էլ․ փոստի հասցեն'
  													]) ?>
                        </span>
                        <spam class='error-msg'><?=($model->hasErrors('email'))?$model->getFirstError('email'):''?></span>
                      </label>
                    </div>

                    <div class="trx_addons_column-1_2">
                      <label class="sc_form_field sc_form_field_email sc_form_field_text required">
                        <span class="sc_form_field_wrap">
                          <?= Html::input('text', 'ContactForm[subject]', $model->subject, [
  													'aria-required' => 'true',
  													'id' => 'subject_1455127033',
  													'placeholder' => 'Կարճ նկարագիր'
  													]) ?>
                        </span>
                        <spam class='error-msg'><?=($model->hasErrors('subject'))?$model->getFirstError('subject'):''?></span>
                      </label>
                    </div>
                  </div>
                  <label class="sc_form_field sc_form_field_message sc_form_field_textarea required">
                    <span class="sc_form_field_wrap">
                      <?= Html::textarea('ContactForm[body]', $model->body, [
                        'aria-required' => 'true',
												'id' => 'message_1762896708',
												'placeholder' => 'Ձեր նամակը',
												]) ?>
                    </span>
                    <spam class='error-msg'><?=($model->hasErrors('body'))?$model->getFirstError('body'):''?></span>
                  </label>
                  <!-- <div class="sc_form_field sc_form_field_checkbox">
                    <input type="checkbox" id="i_agree_privacy_policy_sc_form_1" name="i_agree_privacy_policy" class="sc_form_privacy_checkbox" value="1">
				                <label for="i_agree_privacy_policy_sc_form_1">I agree that my submitted data is being collected and stored. For further details on handling user data, see our
                          <a href="http://heartstar.axiomthemes.com/privacy-policy/" target="_blank">Privacy Policy</a>
                        </label>
			            </div> -->

                  <div class="sc_form_field sc_form_field_button sc_form_field_submit">
                    <button type="submit">Ուղարկել</button>
                  </div>
                  <div class="trx_addons_message_box sc_form_result"></div>
		             <?= Html::endForm() ?>
               </div><!-- /.sc_form -->
             </div>
           <?php endif; ?>
           </div>
         </div>
       </div>
       <div class="vc_row-full-width vc_clearfix"></div>
	</div><!-- .entry-content -->


</article>
<!--
<div class="site-contact">

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Շնորհակալություն ենք հայտնում մեզ հետ կապվելու համար. Մենք ձեզ կպատասխանենք որքան հնարավոր է շուտ.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            Եթե դուք ունեք բիզնես առաջարկներ կամ այլ հարցեր, խնդրում ենք լրացրեք բոլոր դաշտերը մեզ հետ կապնվելու համար։
            Շնուհակալություն։
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div> -->
