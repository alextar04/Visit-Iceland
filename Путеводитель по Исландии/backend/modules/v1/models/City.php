<?php

namespace app\modules\v1\models;
use yii\base\Model;

class City extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Рейкъявик"],
            ['id' => 1, 'name' => "Коупавогюр"],
            ['id' => 2, 'name' => "Хабнарфьодюр"],
            ['id' => 3, 'name' => "Акюрейри"],
            ['id' => 4, 'name' => "Кеблавик"],
        ];
    }
}
