<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "maincontentchapter".
 *
 * @property int $id
 * @property string $name Название
 * @property string $link Ссылка
 */
class Maincontentchapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'maincontentchapter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link'], 'required'],
            [['name', 'link'], 'string', 'max' => 128],
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
            'link' => 'Ссылка',
        ];
    }
}