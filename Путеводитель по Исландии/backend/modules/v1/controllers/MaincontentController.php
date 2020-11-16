<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\MainContent;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use app\modules\v1\models\Video;


class MaincontentController extends ApiController{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/names
     */
    public function actionNames(){   
        $mainPageObject = new MainContent();
        return $mainPageObject -> dataTable();
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/chapter?maincontentid=0
     */
    public function actionChapter($maincontentid){
        /*
            Замена на выборку из БД
            (Раздел главной страницы)
            Фильтр по названию раздела страницы из id
        */
        $chapterObject = new Chapter();
        return $chapterObject->dataTable()[10];
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/note?maincontentid=0
     */
    public function actionNote($maincontentid){
        /*
            Замена на выборку из БД
            (Заметка для главной страницы)
            Фильтр по названию заметки из id
        */
        $noteObject = new Note();
        return $noteObject->dataTable()[8];
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/video
     */
    public function actionVideo(){
        /*
            Замена на выборку из БД
            (Видео для главной страницы)
        */
        $videoObject = new Video();
        return $videoObject->dataTable();
    }
}