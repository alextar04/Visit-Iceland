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
     * http://127.0.0.1:1199/api/v1/housing/chapters
     */
    public function actionChapters(){
        $names = $this->actionNames();
        $idArray = array();
        foreach ($names as $idObject){
            array_push($idArray, $idObject['id']);
        }

        $resultArray = array();
        foreach ($idArray as $maincontentid){
            $housingName = Housing::findOne(['id' => $maincontentid])['name'];
            $response = Chapter::findOne(['text' => $housingName]);
            array_push($resultArray, $response);
        }
        return $resultArray;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/notes?housing=hotels
     */
    public function actionNotes($housing){
        $housingRus = '';
        switch ($housing) {
            case 'hotels':
                $housingRus = 'Отели';
                break;
            case 'kempings':
                $housingRus = 'Кемпинги';
                break;
            case 'guest houses':
                $housingRus = 'Гостевые дома';
                break;
        }
        $response = Note::findAll(['chapterText' => $housingRus]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/photos
     */
    public function actionPhotos(){
        $response = Pagephoto::findAll(['namePage' => 'housing']);
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/housing/mainphoto
     */
    public function actionMainphoto(){
        $response = Pagephoto::findOne(['photo' => '@/assets/housingPageImages/housingImage0.jpg']);
        return $response;
    }

}