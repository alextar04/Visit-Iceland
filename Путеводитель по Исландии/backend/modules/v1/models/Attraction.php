<?php

namespace app\modules\v1\models;
use Yii;

/**
 * This is the model class for table "attraction".
 *
 * @property int $id
 * @property string $name Название
 */
class Attraction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attraction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],
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
        ];
    }
}
/*

namespace app\modules\v1\models;
use yii\base\Model;

class Attraction extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Золотое кольцо"],
            ['id' => 1, 'name' => "Тингведилир"],
            ['id' => 2, 'name' => "Хейкадалюр"],
            ['id' => 3, 'name' => "Голубая лагуна"],
            ['id' => 4, 'name' => "Рейнисфьяра"],
            ['id' => 5, 'name' => "Колонна мира"],
        ];
    }
}*/