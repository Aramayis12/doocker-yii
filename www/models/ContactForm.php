<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required', 'message' => '«{attribute}» դաշտը անհրաժեշտ է լրացնել'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            // ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Անուն',
            'email' => 'էլ. Փոստի հասցե',
            'subject' => 'Կարճ վերնագիր',
            'body' => 'Նամակ',
            // 'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($emails)
    {

        if ($this->validate()) {
          $text = $text = '
          Նամակ մեր օգտատերից
          Այս նամակը ուղարկված է '.Yii::$app->name. '-ի «Կապ» էջից։

          Նամակ ուղարկողի տվյալները
          Անուն։ ' . $this->name . '
          Էլ․ Փոստ։ ' . $this->email . '

          Կցված նամակը
          ֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊֊
          ';

          $text .= $this->body;

          foreach($emails as $email){
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['infoEmail'] => Yii::$app->name . ' robot'])
                ->setSubject($this->subject)
                ->setTextBody($text)
                ->send();
          }

          return true;
        }
        return false;
    }
}
