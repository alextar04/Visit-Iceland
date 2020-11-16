<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Trip;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;


class TripController extends ApiController{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/names
     */
    public function actionNames(){   
        $tripObject = new Trip();
        return $tripObject -> dataTable();
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/chapter?tripid=0
     */
    public function actionChapter($tripid){
        /*
            Замена на выборку из БД
            (Раздел транспорта)
            Фильтр по названию варианта перемещения из id
        */
        $chapterObject = new Chapter();
        return $chapterObject->dataTable()[9];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/note?tripid=0
     */
    public function actionNote($tripid){
        /*
            Замена на выборку из БД
            (Заметка для транспорта)
            Фильтр по названию варианта перемещения из id
        */
        $noteObject = new Note();
        return $noteObject->dataTable()[7];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/photo
     */
    public function actionPhoto(){
        /*
            Замена на выборку из БД
            (Изображения для страницы транспорта)
            Фильтр по namePage == 'trip'
        */
        $photoObject = new PagePhoto();
        return array_slice($photoObject->dataTable(), 8, 1);
    }
}