<?php

namespace app\modules\v1\models;
use yii\base\Model;

class Trip extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => "Самолет"],
            ['id' => 1, 'name' => "Паром"],
            ['id' => 2, 'name' => "Прокат авто"],
        ];
    }
}