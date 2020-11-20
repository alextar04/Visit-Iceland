<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property int|null $idCity Название города
 * @property string $chapterText Название раздела
 * @property string $text Текст
 * @property string $keyword Ключевые слова
 * @property string|null $photoPath Путь к изображению
 *
 * @property City $idCity0
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCity'], 'integer'],
            [['chapterText', 'text', 'keyword'], 'required'],
            [['text'], 'string'],
            [['chapterText'], 'string', 'max' => 100],
            [['keyword', 'photoPath'], 'string', 'max' => 255],
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
            'chapterText' => 'Название раздела',
            'text' => 'Текст',
            'keyword' => 'Ключевые слова',
            'photoPath' => 'Путь к изображению',
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
