<?php

namespace app\controllers;

use Yii;
use \yii\web\Controller;
use app\models\Product;
use app\models\Orders;
use app\models\Signup;
use app\models\User;
use yii\helpers\Url;

class CheckoutController extends Controller
{
    // public $layout = 'product';

    public function actionIndex()
    {
      if (!Yii::$app->request->isPost) $this->redirect(['/']);

      $qty = Yii::$app->request->post('qty');
      $price = Yii::$app->request->post('price');
      $gift_for = Yii::$app->request->post('attribute_gift_for');
      $pay_type = Yii::$app->request->post('attribute_pay_type'); // 0 - cash, 1 - idram, 2 - terminal
      $product = Product::find()->one();
      $model = new Orders();

      if($gift_for){
        $model->scenario = Orders::SCENARIO_GIFT;
      } else {
        $model->scenario = Orders::SCENARIO_ME;
      }

      if ($model->load(Yii::$app->request->post())) {
          $model->qty = $qty;
          $model->price = $price;
          $model->recipient_for = $gift_for;
          $model->pay_type = $pay_type;
          $model->created_at = time();
          $model->shipping_status = 'AWAITING_ORDER';
          $model->payment_status = 'AWAITING_PAYMENT';

          if(!Yii::$app->getUser()->isGuest) {
            $model->email = Yii::$app->user->identity->email;
          }

          if(isset($_COOKIE['utm_source'])){
              $model->utm_source = $_COOKIE['utm_source'];
          }

          if($model->save()){
            // Months
            $months = array(
              1 => 'Հունվար',2 => 'Փետրվար.', 3 => 'Մարտ',4 => 'Ապրիլ',
              5 => 'Մայիս',6 => 'Հունիս',7 => 'Հուլիս',8 => 'Օգոստոս',
              9 => 'Սեպտեմբեր',10 => 'Հոկտեմբեր',11 => 'Նոյեմբեր',12 => 'ԴԵկտեմբեր'
            );

            // Send to User
            $html = '
            <h3>Պատվերն ընդունված է</h3>
            <p>Առաքման ամիս, օր, ժամ։ '.$months[$model->month].', '.$model->day.', '.$model->time . '
            Նվերների քանակը ' . $qty . ' հատ։';

            $text = '
            Պատվերն ընդունված է
            Առաքման ամիս, օր, ժամ։ '.$months[$model->month].', '.$model->day.', '.$model->time . '
            Նվերների քանակը ' . $qty . ' հատ։';

            switch ($pay_type) {
              case 0:
                // Cash
                // $html .= '<p>Դուք ընտրել եք առձեռն վճարման տարբերակը</p>';
                // $text .= '';
                break;
              case 1:
                // iDram
                $html .= '<p>
                Դուք ընտրել եք իԴրամով վճարման տարբերակը։<br>
                Պատվերն հաստատելու համար խնդրում ենք փոխանցել ձեր իԴրամից ' . ($price*$qty) . ' դրամ  979747380 իԴրամ ID-ին։
                </p>';
                $text .= 'Դուք ընտրել եք իԴրամով վճարման տարբերակը։
                Պատվերն հաստատելու համար խնդրում ենք փոխանցել ձեր իԴրամից ' . ($price*$qty) . ' դրամ  979747380 իԴրամ ID-ին։';
                break;
              case 2:
                // Termianl
                $html .= '<p>
                Դուք ընտրել եք տերմինալով վճարման տարբերակը։<br>
                Պատվերն հաստատելու համար խնդրում ենք փոխանցել որևէ տերմինալից ' . ($price*$qty) . ' դրամ  979747380 իԴրամ ID-ին։<br>
                Նկարեք չեկը և ուղարկեք մեր ֆեյսբուքյան էջին նշելով ձեր անուն ազգանունը։</p>';
                $text .= '
                Դուք ընտրել եք տերմինալով վճարման տարբերակը։
                Պատվերն հաստատելու համար խնդրում ենք փոխանցել որևէ տերմինալից ' . ($price*$qty) . ' դրամ  979747380 իԴրամ ID-ին։
                Նկարեք չեկը և ուղարկեք մեր ֆեյսբուքյան էջին նշելով ձեր անուն ազգանունը։';
                break;
            }

            // Check user exist
            $user = User::findByEmail($model->email);

            if(!$user){
                $pass = $this->randomPassword();

                // Signup user
                $signUp = new Signup();
                $signUp->username = $model->first_name . ' ' . $model->last_name;
                $signUp->email = $model->email;
                $signUp->password = $pass;
                $signUp->retypePassword = $pass;

                if($user = $signUp->signup()){
                  $html .= '<p>Դուք կարող եք հետևել ձեր պատվերին մուտք գործելով հետևյալ տվյալներով</p>
                  <p>Ծածկանուն: ' . $model->email.'<br>Գաղտնաբառ։ ' . $pass . '</p>';

                  $text .= '

                  Դուք կարող եք հետևել ձեր պատվերին մուտք գործելով հետևյալ տվյալներով
                  Ծածկանուն: ' . $model->email.'
                  Գաղտնաբառ։ ' . $pass;
                }
            } else {
                $html .= '<p>Առաքման ընթացքին հետևելու համար մուտք գործեք ձեր <a href="'.Url::to(['/my-account'], true).'">անձնական էջ</a></p>';

                $text .= '

                Առաքման ընթացքին հետևելու համար մուտք գործեք ձեր անձնական էջ';
            }

            $subject = 'Ձեր պատվերն ընդունված է';

            $html .= '</p><p><b>Սիրելի </b>'.$model->first_name.' '. $model->last_name . ' Շնորհակալություն ենք հայտնում մեր ծառայություններից օգտվելու համար</p>
            <p>Հարցերի դեպքում կարող էք կապվել մեզ հետ մեր <a href="https://fb.me/SpecialGifts.am">ֆեյսբուքյան էջ</a>-ի միջոցով կամ զանգահարել (091) 749904 Հեռախոսահամարով։</p>
            <p>Սիրով Ձեր <b style="color:#fe3c5c;">'.Yii::$app->name.'</b></p>';

            $text .= '

            Սիրելի '.$model->first_name.' '. $model->last_name . ' Շնորհակալություն ենք հայտնում մեր ծառայություններից օգտվելու համար
            Հարցերի դեպքում կարող էք կապվել մեզ հետ մեր ֆեյսբուքյան էջի միջոցով https://fb.me/SpecialGifts.am  կամ զանգահարել (091) 749904 Հեռախոսահամարով։
            Սիրով Ձեր '.Yii::$app->name;

            // $web_path = Yii::getAlias('@web/image/v1.png');

            // Send to User
            $userEmail = Yii::$app->mailer->compose()
                    ->setTo($model->email)
                    ->setFrom([Yii::$app->params['infoEmail'] => Yii::$app->name . ' robot'])
                    ->setSubject($subject)
                    ->setTextBody($text)
                    ->setHtmlBody($html);

          $userEmail->send();

            // Send to Admins
            $html = '
            <h3>Նոր Պատվեր</h3>
            <p>Առաքման ամիս, օր, ժամ։ '.$months[$model->month].', '.$model->day.', '.$model->time.'</p>
            <p><b>Պատվիրատուի անունը: </b>'.$model->first_name.' '. $model->last_name . '</p>
            <p><b>էլ․ փոստի հասցեն: </b>'.$model->email.'</p>
            <p><b>Հեռախոս: </b>'.$model->phone.'</p>
            <p><b>Քանակ: </b>'.$model->qty.'</p>
            <p><b>Գին: </b>'.$model->price.'</p>';

            $text = '
            Նոր Պատվեր
            Առաքման ամիս, օր, ժամ։ '.$months[$model->month].', '.$model->day.', '.$model->time.'
            Պատվիրատուի անունը: '.$model->first_name.' '. $model->last_name . '
            էլ․ փոստի հասցեն: '.$model->email.'
            Հեռախոս: '.$model->phone . '
            Քանակ: '.$model->qty . '
            Գին: '.$model->price;

            switch ($pay_type) {
              case 0:
                // Cash
                $html .= '<p><b>Վճարում: </b>Առձեռն</p>';
                $text .= '
                Վճարում: Առձեռն';
                break;
              case 1:
                // iDram
                $html .= '<p><b>Վճարում: </b>իԴրամ</p>';
                $text .= '
                Վճարում: իԴրամ';
                break;
              case 2:
                // Termianl
                $html .= '<p><b>Վճարում: </b>Տերմինալ</p>';
                $text .= '
                Վճարում: Տերմինալ';
                break;
              }

              switch ($gift_for) {
                case 0:
                  // For Me
                  $html .= '<p><b>Առաքման Հասցե: </b>' . $model->city . ' - ' . $model->address_1 . '</p>';
                  $text .= '
                  Առաքման Հասցե: ' . $model->city . ' - ' . $model->address_1;
                  break;
                case 1:
                  // Gift
                  $html .= '<p><b>Առաքման Հասցե: </b>' . $model->recipient_city . ' - ' . $model->recipient_address_1 . '</p>';
                  $text .= '
                  Առաքման Հասցե: ' . $model->recipient_city . ' - ' . $model->recipient_address_1;
                  break;
                }

            $dublicate_mailer  = Yii::$app->mailer->compose()
                ->setFrom([Yii::$app->params['infoEmail'] => Yii::$app->name . ' robot'])
                ->setSubject('Նոր պատվեր “SpecialGifts”֊ից')
                // ->setReplyTo($this->email)
                ->setTextBody($text)
                ->setHtmlBody($html);

            // Send to admins
            if(count(Yii::$app->params['adminEmails']) > 0){
                $d_emails = Yii::$app->params['adminEmails'];

                foreach ($d_emails as $d_email){
                    $dublicate_mailer->setTo($d_email);
                    $dublicate_mailer->send();
                }
            }

            if (!Yii::$app->getUser()->isGuest) {
              Yii::$app->session->setFlash('success', "Մենք ուրախությամբ տեղեկացնում ենք ձեզ, որ պատվերն ընդունված է, դուք կտեղեկանաք մնացածի մասին ձեր էլ․ փոստի միջոցով։");
              return $this->redirect(['/my-account']);
            }

            return $this->redirect(['/thankyou']);
          }

      }

      if(!Yii::$app->getUser()->isGuest) {
        $model->email = Yii::$app->user->identity->email;
      }

      return $this->render('index', [
        'model' => $model,
        'product' => $product,
        'qty' => $qty,
        'gift_for' => $gift_for,
        'pay_type' => $pay_type,
        'price' => $price
      ]);
    }

    private function randomPassword()
    {
      $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
      $pass = array(); //remember to declare $pass as an array
      $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
      for ($i = 0; $i < 8; $i++) {
          $n = rand(0, $alphaLength);
          $pass[] = $alphabet[$n];
      }
      return implode($pass); //turn the array into a string
    }

}
