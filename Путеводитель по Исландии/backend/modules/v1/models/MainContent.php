<?php

namespace app\modules\v1\models;
use yii\base\Model;

class MainContent extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Столица"],
            ['id' => 1, 'name' => "Что посмотреть"],
            ['id' => 2, 'name' => "Кухня"],
            ['id' => 3, 'name' => "Как добраться"],
            ['id' => 4, 'name' => "Где жить"],
            ['id' => 5, 'name' => "На заметку"],
        ];
    }
}