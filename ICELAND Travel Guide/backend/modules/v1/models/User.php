<?php

namespace app\modules\v1\models;
use yii\base\Model;

class User extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['login'], 'required', 'string'],
            [['password'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'login' => "log123", 'password' => 'pass123'],
            ['id' => 1, 'login' => "log223", 'password' => 'pass223'],
            ['id' => 2, 'login' => "log323", 'password' => 'pass323'],
        ];
    }
}
