<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogs".
 *
 * @property int $id
 * @property string $title
 * @property string $public_date
 * @property string $text
 * @property string $slug
 * @property string $cover_image
 * @property int $created_at
 */
class Blogs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['slug'], 'required'],
            [['created_at'], 'integer'],
            [['title', 'public_date', 'slug', 'cover_image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'public_date' => 'Public Date',
            'text' => 'Text',
            'slug' => 'Slug',
            'cover_image' => 'Cover Image',
            'created_at' => 'Created At',
        ];
    }
}
