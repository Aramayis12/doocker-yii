<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $categoryID
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $date_created
 * @property int $inStock
 * @property int $price
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryID', 'inStock', 'price', 'title'], 'required', 'message' => '«{attribute}» դաշտը անհրաժեշտ է'],
            [['categoryID', 'inStock', 'price', 'original_price'], 'integer'],
            [['description'], 'string'],
            [['title', 'image', 'date_created', 'slug'], 'string', 'max' => 255],
            [['categoryID'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['categoryID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryID' => 'Կատեգորիան',
            'title' => 'Անվանումը',
            'description' => 'Նկարագրությունը',
            'inStock' => 'Առկա է',
            'price' => 'Կայքում Գինը',
            'original_price' => 'Գինը',
            'image' => 'Նկար',
            'date_created' => 'Ամսաթիվ',
            'source' => 'Հղումը',
            'sales_qty' => 'Վաճառված է',
            'views_qty' => 'դիտված է',
            'status' => 'Ստատուս',
            'slug' => 'Url անունը'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'categoryID']);
    }
}
