<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $name Название
 * @property string $engName Латинское название
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'engName'], 'required'],
            [['name', 'engName'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'engName' => 'Латинское название'
        ];
    }
}
