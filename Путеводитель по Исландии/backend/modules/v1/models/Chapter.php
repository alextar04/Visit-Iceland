<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property int $id
 * @property int|null $idCity Название города
 * @property string $text Текст
 * @property string $photoPath Путь к изображению
 * @property string $link Ссылка в приложении
 *
 * @property City $idCity0
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCity'], 'integer'],
            [['text', 'photoPath', 'link'], 'required'],
            [['text'], 'string'],
            [['photoPath', 'link'], 'string', 'max' => 255],
            [['idCity'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['idCity' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idCity' => 'Название города',
            'text' => 'Текст',
            'photoPath' => 'Путь к изображению',
            'link' => 'Ссылка в приложении',
        ];
    }

    /**
     * Gets query for [[IdCity0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCity0()
    {
        return $this->hasOne(City::className(), ['id' => 'idCity']);
    }
}