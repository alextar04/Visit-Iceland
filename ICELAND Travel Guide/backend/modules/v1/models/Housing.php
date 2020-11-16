<?php

namespace app\modules\v1\models;
use yii\base\Model;

class Housing extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Отели"],
            ['id' => 1, 'name' => "Кемпинги"],
            ['id' => 2, 'name' => "Гостевые дома"],
        ];
    }
}