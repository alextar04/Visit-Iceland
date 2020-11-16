<?php

namespace app\modules\v1\models;
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
}