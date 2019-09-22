<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $address_1
 * @property string $city
 * @property string $phone
 * @property string $email
 * @property string $interests
 * @property string $recipient_first_name
 * @property string $recipient_last_name
 * @property string $recipient_address_1
 * @property string $recipient_city
 * @property string $recipient_interests
 * @property string $user_id
 * @property string $month
 * @property string $day
 * @property string $created_at
 * @property string $age
 * @property string $recipient_age
 * @property string $time
 * @property string $qty
 * @property integer $recipient_for
 * @property string $shipping_status
 * @property string $payment_status
 * @property string $utm_source
 * @property integer $pay_type
 * @property integer $price
 */
class Orders extends \yii\db\ActiveRecord
{
    const SCENARIO_ME = 'me';
    const SCENARIO_GIFT = 'gift';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'email', 'month', 'day', 'time'], 'required', 'message' => '«{attribute}» դաշտը անհրաժեշտ է լրացնել'],
            [['address_1', 'city', 'age'], 'required', 'on' => self::SCENARIO_ME,  'message' => '«{attribute}» դաշտը անհրաժեշտ է լրացնել'],
            [['recipient_first_name', 'recipient_last_name', 'recipient_address_1', 'recipient_city', 'recipient_age'], 'required', 'on' => self::SCENARIO_GIFT, 'message' => '«{attribute}» դաշտը անհրաժեշտ է լրացնել'],
            [['first_name', 'last_name', 'address_1', 'city', 'phone', 'email', 'recipient_first_name', 'recipient_last_name', 'recipient_address_1', 'recipient_city', 'time', 'shipping_status', 'payment_status', 'utm_source'], 'string', 'max' => 255],
            [['interests', 'recipient_interests'], 'string'],
            [['user_id', 'month', 'day', 'created_at', 'age', 'qty', 'recipient_age', 'recipient_for', 'pay_type', 'price'], 'integer', 'message' => '«{attribute}»-ը պետք է լինի ամբողջ թիվ'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Անուն',
            'last_name' => 'Ազգանուն',
            'address_1' => 'Փողոց/տուն',
            'city' => 'Քաղաք',
            'phone' => 'Հեռախոսահամար',
            'email' => 'էլ. Փոստի հասցե',
            'interests' => 'Հետաքրքրություններ',
            'recipient_first_name' => 'Անուն',
            'recipient_last_name' => 'Ազգանուն',
            'recipient_address_1' => 'Փողոց/տուն',
            'recipient_city' => 'Քաղաք',
            'recipient_interests' => 'Հետաքրքրություններ',
            'month' => 'Ամիս',
            'day' => 'Օր',
            'age' => 'Տարիք',
            'recipient_age' => 'Տարիք',
            'time' => 'Ժամ',
            'shipping_status' => 'Առաքում(Կարգավիճակ)',
            'payment_status' => 'Վճարում(Կարգավիճակ)',
            'qty' =>  'Քանակ',
            'recipient_for' => 'Ում համար է՞',
            'created_at' => 'Պատվիրվել է',
            'user_id' => 'Օգտատեր',
            'utm_source' => 'UTM հասցեն',
            'pay_type' => 'Վճարման եղանակը',
            'price' => 'Արժեք'
        ];
    }
}
