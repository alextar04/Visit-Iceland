<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\City;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;


class CityController extends ApiController
{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/names
     */
    public function actionNames(){   
        $cityObject = new City();
        return $cityObject -> dataTable();
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/name?id=2
     */
    public function actionName($id){
        $city = $this->actionNames()[$id]["name"];
        return [
            'pageName' => $city
        ];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/chapter?cityid=0
     */
    public function actionChapter($cityid){
        /*
            Замена на выборку из БД
            (Раздел определенного города)
        */
        $chapterObject = new Chapter();
        return array_slice($chapterObject->dataTable(), 0, 6);
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/note?cityid=0&chapterid=0
     */
    public function actionNote($cityid, $chapterid){
        /*
            Замена на выборку из БД
            (Заметки определенного города, определенного раздела)
        */
        $noteObject = new Note();
        return array_slice($noteObject->dataTable(), 0, 4);
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/photo?cityid=0
     */
    public function actionPhoto($cityid){
        /*
            Замена на выборку из БД
            (Фото определенного города)
        */
        $cityPhotoObject = new PagePhoto();
        return array_slice($cityPhotoObject->dataTable(), 0, 3);
    }

}