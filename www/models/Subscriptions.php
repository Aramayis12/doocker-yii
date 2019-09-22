<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriptions".
 *
 * @property int $id
 * @property string $email
 * @property string $created_at
 */
class Subscriptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscriptions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['created_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
            [['email'], 'unique', 'message' => '{value} էլ․ փոստը արդեն առկա է'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'էլ. Փոստի հասցե',
            'created_at' => 'Created At',
        ];
    }
}
