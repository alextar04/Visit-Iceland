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
     * http://127.0.0.1:1199/api/v1/kitchen/chapters
     */
    public function actionChapters(){
        $names = $this->actionNames();
        $idArray = array();
        foreach ($names as $idObject){
            array_push($idArray, $idObject['id']);
        }

        $resultArray = array();
        foreach ($idArray as $id){
            $kitchenName = Kitchen::findOne(['id' => $id])['name'];
            $response = Chapter::findOne(['text' => $kitchenName]);
            array_push($resultArray, $response);
        }
        return $resultArray;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/notes?kitchen=streetfood
     */
    public function actionNotes($kitchen){
        $kitchenRus = '';
        switch ($kitchen) {
            case 'streetfood':
                $kitchenRus = 'Стритфуд';
                break;
            case 'cafe':
                $kitchenRus = 'Рестораны/кафе';
                break;
            case 'bars':
                $kitchenRus = 'Бары';
                break;
        }
        $response = Note::findAll(['chapterText' => $kitchenRus]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/kitchen/photos
     */
    public function actionPhotos(){
        $response = Pagephoto::findAll(['namePage' => 'kitchen']);
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/mainphoto
     */
    public function actionMainphoto(){
        $response = Pagephoto::findOne(['photo' => '@/assets/kitchenPageImages/kitchenPage0.jpg']);
        return $response;
    }

}