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


/*
use yii\base\Model;

class PagePhoto extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['namePage'], 'required', 'string'],
            [['idCity'], 'number'],
            [['photo'], 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'namePage' => 'city', 'idCity' => 0, 'photo' => '@/assets/cityPageImages/cityPage1_0.jpg'],
            ['id' => 1, 'namePage' => 'city', 'idCity' => 0, 'photo' => '@/assets/cityPageImages/cityPage2_0.jpg'],
            ['id' => 2, 'namePage' => 'city', 'idCity' => 0, 'photo' => '@/assets/cityPageImages/cityPage3_0.jpg'],
            ['id' => 3, 'namePage' => 'attraction', 'photo' => '@/assets/attractionPageImages/attractionsPage7.jpg', 'activeForFirst' => "carousel-item active"],
            ['id' => 4, 'namePage' => 'attraction', 'photo' => '@/assets/attractionPageImages/attractionsPage7.jpg', 'activeForFirst' => "carousel-item active"],
            ['id' => 5, 'namePage' => 'attraction', 'photo' => '@/assets/attractionPageImages/attractionsPage7.jpg', 'activeForFirst' => "carousel-item active"],
            ['id' => 6, 'namePage' => 'housing', 'photo' => '@/assets/housingPageImages/housingImage0.jpg'],
            ['id' => 7, 'namePage' => 'kitchen', 'photo' => '@/assets/kitchenPageImages/kitchenPage5.jpg'],
            ['id' => 8, 'namePage' => 'trip', 'photo' => '@/assets/tripPageImages/tripPage1.jpg'],
        ];
    }
}*/