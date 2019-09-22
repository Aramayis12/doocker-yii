<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "congratulation_messages".
 *
 * @property int $id
 * @property string $celebration
 * @property string $message
 */
class CongratulationMessages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congratulation_messages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['message'], 'string'],
            [['celebration'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'celebration' => 'Celebration',
            'message' => 'Message',
        ];
    }
}
