<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\City;
use app\modules\v1\models\CityChapter;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use Yii;


class CityController extends ApiController
{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/create
     */
    public function actionCreate(){
        $model = new City();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/names
     */
    public function actionNames(){   
        $response = City::find()
                    ->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/name?id=2
     */
    public function actionName($id){
        $response = City::findOne(['id' => $id])["name"];
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/chapter?idCity=1
     */
    public function actionChapter($idCity){
        $response = Chapter::findAll(['idCity' => $idCity]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/note?idCity=0&idChapter=0
     */
    public function actionNote($idCity, $idChapter){
        $chaptername = CityChapter::findOne(['id' => $idChapter])['name'];
        $response = Note::findOne(['idCity' => $idCity, 'chapterText' => $chaptername]);
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/city/photo?idCity=0
     */
    public function actionPhoto($idCity){
        $response = Pagephoto::findAll(['idCity' => $idCity]);
        return $response;
    }

}