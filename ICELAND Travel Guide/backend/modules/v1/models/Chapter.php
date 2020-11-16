<?php

namespace app\modules\v1\models;
use yii\base\Model;

class Chapter extends Model {

    public function rules(){
        return [
            [['id'], 'required', 'number'],
            [['idCity'], 'number'],
            [['text'], 'string'],
            [['photoPath'], 'string'],
            [['link'], 'string'],
        ];
    }

    public function dataTable(){
        return [
            ['id' => 0, 'idCity' => 0, 'text' => "История", 'photoPath' => '@/assets/cityPageImages/cityPage1_1.jpeg', 'link' => "Рейкъявик#history"],
            ['id' => 1, 'idCity' => 0, 'text' => "География", 'photoPath' => '@/assets/cityPageImages/cityPage2_1.png', 'link' => "#geography"],
            ['id' => 2, 'idCity' => 0, 'text' => "Климат",  'photoPath' => '@/assets/cityPageImages/cityPage3_1.jpg', 'link' => "#climate"],
            ['id' => 3, 'idCity' => 0, 'text' => "Интересное",  'photoPath' => '@/assets/cityPageImages/cityPage4_1.jpg', 'link' => "#interesting"],
            ['id' => 4, 'idCity' => 0, 'text' => "Покупки",  'photoPath' => '@/assets/cityPageImages/cityPage5_1.jpg', 'link' => "#buying"],
            ['id' => 5, 'idCity' => 0, 'text' => "Транспорт",  'photoPath' => '@/assets/cityPageImages/cityPage6_1.png', 'link' => "#transport"],
            ['id' => 6, 'text' => "Золотое кольцо", 'photoPath' => '@/assets/attractionPageImages/attractionsPage1.jpg', 'link' => "/attractions#1a"],
            ['id' => 7, 'text' => "Отели", 'photoPath' => '@/assets/housingPageImages/housingImage1.jpg', 'link' => "/housing#hotel"],
            ['id' => 8, 'text' => "Стритфуд", 'photoPath' => '@/assets/kitchenPageImages/kitchenPage1.jpg', 'link' => "/kitchen#streetfood"],
            ['id' => 9, 'text' => "Самолет", 'photoPath' => '@/assets/tripPageImages/tripPage1.jpg', 'link' => "/trip#plane"],
            ['id' => 10, 'text' => "На заметку", 'photoPath' => '@/assets/homePageImages/startPage9.jpg', 'link' => "#notes"],
        ];
    }
}