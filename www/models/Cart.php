<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property string $hash
 * @property int $user_id
 * @property int $product_id
 * @property int $qty
 * @property int $price
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id', 'qty', 'price'], 'integer'],
            [['hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
            'qty' => 'Qty',
            'price' => 'Price',
        ];
    }
}
