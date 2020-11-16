<?php

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
}