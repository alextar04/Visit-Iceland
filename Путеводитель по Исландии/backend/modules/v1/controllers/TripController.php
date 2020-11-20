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
     * http://127.0.0.1:1199/api/v1/trip/chapters
     */
    public function actionChapters(){
        $names = $this->actionNames();
        $idArray = array();
        foreach ($names as $idObject){
            array_push($idArray, $idObject['id']);
        }

        $resultArray = array();
        foreach ($idArray as $id){
            $tripName = Trip::findOne(['id' => $id])['name'];
            $response = Chapter::findOne(['text' => $tripName]);
            array_push($resultArray, $response);
        }
        return $resultArray;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/notes?trip=plane
     */
    public function actionNotes($trip){
        $tripRus = '';
        switch ($trip) {
            case 'plane':
                $tripRus = 'Самолет';
                break;
            case 'ferry':
                $tripRus = 'Паром';
                break;
            case 'loanAuto':
                $tripRus = 'Прокат авто';
                break;
        }
        $response = Note::findAll(['chapterText' => $tripRus]);
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

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/trip/mainphoto
     */
    public function actionMainphoto(){
        $response = Pagephoto::findOne(['photo' => '@/assets/tripPageImages/tripPage0.jpg']);
        return $response;
    }
}