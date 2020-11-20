<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "pagephoto".
 *
 * @property int $id
 * @property string $namePage Тип страницы
 * @property int|null $idCity id города
 * @property string $photo Путь к изображению
 *
 * @property City $idCity0
 */
class Pagephoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagephoto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['namePage', 'photo'], 'required'],
            [['idCity'], 'integer'],
            [['namePage', 'photo'], 'string', 'max' => 255],
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
            'namePage' => 'Тип страницы',
            'idCity' => 'id города',
            'photo' => 'Путь к изображению',
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
