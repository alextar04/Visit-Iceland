<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\MainContentChapter;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use app\modules\v1\models\Video;
use Yii;


class MaincontentController extends ApiController{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/create
     */
    public function actionCreate(){
        $model = new MainContentChapter();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/names
     */
    public function actionNames(){   
        $response = MainContentChapter::find()->all();
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/chapter?maincontentid=0
     */
    public function actionChapter($maincontentid){
        $contentName = MainContentChapter::findOne(['id' => $maincontentid])['name'];
        $response = Chapter::findOne(['text' => $contentName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/note?maincontentid=0
     */
    public function actionNote($maincontentid){
        $contentName = MainContentChapter::findOne(['id' => $maincontentid])['name'];
        $response = Note::findAll(['chapterText' => $contentName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'maincontent']);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/getvideo
     */
    public function actionGetvideo(){
        $response = Video::findOne(['id' => 0]);
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/addvideo?link=www.ru
     */
    public function actionAddvideo($link){
        $response = Video::findOne(['id' => 0]);
        $response->link = $link;
        $response->save();
        return $response;
    }
}