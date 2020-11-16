<?php

namespace app\modules\v1\models;
use yii\base\Model;

class Video extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['name'], 'required', 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'name' => 'https://www.youtube.com/embed/wb84vvYSPEU'],
        ];
    }
}