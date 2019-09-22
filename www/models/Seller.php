<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seller".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $description
 *
 * @property Gifts[] $gifts
 */
class Seller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGifts()
    {
        return $this->hasMany(Gifts::className(), ['seller_id' => 'id']);
    }
}
