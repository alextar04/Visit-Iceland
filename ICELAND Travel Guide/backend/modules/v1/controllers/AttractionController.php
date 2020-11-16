<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Attraction;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use app\modules\v1\models\Comment;


class AttractionController extends ApiController{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/names
     */
    public function actionNames(){   
        $attractionObject = new Attraction();
        return $attractionObject -> dataTable();
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/chapter?attractionid=0
     */
    public function actionChapter($attractionid){
        /*
            Замена на выборку из БД
            (Раздел достопримечательности)
            Фильтр по имени достопримечательности из id
        */
        $chapterObject = new Chapter();
        return $chapterObject->dataTable()[6];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/note?attractionid=0
     */
    public function actionNote($attractionid){
        /*
            Замена на выборку из БД
            (Заметка для достопримечательности)
            Фильтр по имени достопримечательности из id
        */
        $noteObject = new Note();
        return $noteObject->dataTable()[4];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/photo
     */
    public function actionPhoto(){
        /*
            Замена на выборку из БД
            (Изображения для страницы достопримечательностей)
            Фильтр по namePage == 'attractions'
        */
        $photoObject = new PagePhoto();
        return array_slice($photoObject->dataTable(), 3, 3);
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/comment?id=0
     */
    public function actionComment($id){
        /*
            Замена на выборку из БД
            Получение комментария с определенным id
        */
        $commentObject = new Comment();
        return $commentObject->dataTable()[$id];
    }

}