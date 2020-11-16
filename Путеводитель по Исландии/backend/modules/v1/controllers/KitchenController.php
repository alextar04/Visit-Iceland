<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Kitchen;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;


class KitchenController extends ApiController{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/names
     */
    public function actionNames(){   
        $kitchenObject = new Kitchen();
        return $kitchenObject -> dataTable();
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/chapter?kitchenid=0
     */
    public function actionChapter($kitchenid){
        /*
            Замена на выборку из БД
            (Раздел кухни)
            Фильтр по названию кухни из id
        */
        $chapterObject = new Chapter();
        return $chapterObject->dataTable()[8];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/note?kitchenid=0
     */
    public function actionNote($kitchenid){
        /*
            Замена на выборку из БД
            (Заметка для Кухни)
            Фильтр по названию кухни из id
        */
        $noteObject = new Note();
        return $noteObject->dataTable()[6];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/photo
     */
    public function actionPhoto(){
        /*
            Замена на выборку из БД
            (Изображения для страницы кухни)
            Фильтр по namePage == 'kitchen'
        */
        $photoObject = new PagePhoto();
        return array_slice($photoObject->dataTable(), 7, 1);
    }
}