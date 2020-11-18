<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $username
 * @property string $date
 * @property string $text
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'date', 'text'], 'required'],
            [['date'], 'safe'],
            [['text'], 'string'],
            [['username'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'date' => 'Date',
            'text' => 'Text',
        ];
    }
}