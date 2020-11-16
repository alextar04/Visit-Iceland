<?php

namespace app\modules\v1\models;
use yii\base\Model;

class Kitchen extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Стритфуд"],
            ['id' => 1, 'name' => "Рестораны/кафе"],
            ['id' => 2, 'name' => "Бары"],
        ];
    }
}