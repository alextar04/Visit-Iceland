<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Trip;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use Yii;


class TripController extends ApiController{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/create
     */
    public function actionCreate(){
        $model = new Trip();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/names
     */
    public function actionNames(){   
        $response = Trip::find()->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/chapter?tripid=0
     */
    public function actionChapter($tripid){
        $tripName = Trip::findOne(['id' => $tripid])['name'];
        $response = Chapter::findAll(['text' => $tripName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/note?tripid=0
     */
    public function actionNote($tripid){
        $tripName = Trip::findOne(['id' => $tripid])['name'];
        $response = Note::findAll(['chapterText' => $tripName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'trip']);
        return $response;
    }
}