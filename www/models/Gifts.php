<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gifts".
 *
 * @property int $id
 * @property string $name
 * @property int $in_stock
 * @property int $qty
 * @property int $sales_qty
 * @property int $seller_id
 * @property int $price
 * @property string $image
 *
 * @property Seller $seller
 */
class Gifts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gifts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['in_stock', 'qty', 'sales_qty', 'seller_id', 'price'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['seller_id'], 'exist', 'skipOnError' => true, 'targetClass' => Seller::className(), 'targetAttribute' => ['seller_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Անուն',
            'in_stock' => 'Առկա է',
            'qty' => 'Քանակ',
            'sales_qty' => 'Վաճառքի քանակ',
            'seller_id' => 'Վաճառող',
            'price' => 'Գին',
            'image' => 'Նկար',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(Seller::className(), ['id' => 'seller_id']);
    }
}
