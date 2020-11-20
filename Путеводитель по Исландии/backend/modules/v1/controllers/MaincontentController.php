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
     * http://127.0.0.1:1199/api/v1/maincontent/chapters
     */
    public function actionChapters(){

        $names = $this->actionNames();
        $idArray = array();
        foreach ($names as $idObject){
            array_push($idArray, $idObject['id']);
        }

        $resultArray = array();
        foreach ($idArray as $maincontentid){
            $contentName = MainContentChapter::findOne(['id' => $maincontentid])['name'];
            $response = Chapter::findOne(['text' => $contentName]);
            array_push($resultArray, $response);
        }
        return $resultArray;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/notes
     */
    public function actionNotes(){
        $response = Note::findAll(['chapterText' => "На заметку"]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/description
     */
    public function actionDescription(){
        $response = Note::findOne(['chapterText' => 'Описание']);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/maincontent/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'homepage']);
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