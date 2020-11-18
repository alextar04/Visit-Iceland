<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Housing;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use Yii;


class HousingController extends ApiController{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/create
     */
    public function actionCreate(){
        $model = new Housing();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/names
     */
    public function actionNames(){   
        $response = Housing::find()->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/chapter?housingid=0
     */
    public function actionChapter($housingid){
        $housingName = Housing::findOne(['id' => $housingid])['name'];
        $response = Chapter::findAll(['text' => $housingName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/note?housingid=0
     */
    public function actionNote($housingid){
        $housingName = Housing::findOne(['id' => $housingid])['name'];
        $response = Note::findAll(['chapterText' => $housingName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'housing']);
        return $response;
    }
}