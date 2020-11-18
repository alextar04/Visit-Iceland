<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Kitchen;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use Yii;


class KitchenController extends ApiController{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/create
     */
    public function actionCreate(){
        $model = new Kitchen();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/names
     */
    public function actionNames(){   
        $response = Kitchen::find()->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/chapter?kitchenid=0
     */
    public function actionChapter($kitchenid){
        $kitchenName = Kitchen::findOne(['id' => $kitchenid])['name'];
        $response = Chapter::findAll(['text' => $kitchenName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/note?kitchenid=0
     */
    public function actionNote($kitchenid){
        $kitchenName = Kitchen::findOne(['id' => $kitchenid])['name'];
        $response = Note::findAll(['chapterText' => $kitchenName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'kitchen']);
        return $response;
    }
}