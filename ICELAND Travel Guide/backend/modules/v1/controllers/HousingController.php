<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Housing;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;


class HousingController extends ApiController{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/names
     */
    public function actionNames(){   
        $housingObject = new Housing();
        return $housingObject -> dataTable();
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/chapter?housingid=0
     */
    public function actionChapter($housingid){
        /*
            Замена на выборку из БД
            (Раздел Жилья)
            Фильтр по названию жилья из id
        */
        $chapterObject = new Chapter();
        return $chapterObject->dataTable()[7];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/note?housingid=0
     */
    public function actionNote($housingid){
        /*
            Замена на выборку из БД
            (Заметка для достопримечательности)
            Фильтр по имени достопримечательности из id
        */
        $noteObject = new Note();
        return $noteObject->dataTable()[5];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/photo
     */
    public function actionPhoto(){
        /*
            Замена на выборку из БД
            (Изображения для страницы вариантов размещения)
            Фильтр по namePage == 'attractions'
        */
        $photoObject = new PagePhoto();
        return array_slice($photoObject->dataTable(), 6, 1);
    }
}