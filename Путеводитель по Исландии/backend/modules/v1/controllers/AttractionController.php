<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Attraction;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use app\modules\v1\models\Comment;
use app\modules\v1\models\User;
use Yii;


class AttractionController extends ApiController{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/create
     */
    public function actionCreate(){
        $model = new Attraction();
        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/names
     */
    public function actionNames(){   
        $response = Attraction::find()
                    ->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/chapters
     */
    public function actionChapters(){
        $names = $this->actionNames();
        $idArray = array();
        foreach ($names as $idObject){
            array_push($idArray, $idObject['id']);
        }

        $resultArray = array();
        foreach ($idArray as $attractionid){
            $attractionName = Attraction::findOne(['id' => $attractionid])['name'];
            $response = Chapter::findOne(['text' => $attractionName]);
            array_push($resultArray, $response);
        }
        return $resultArray;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/note?attractionname=Хейкадалюр 
     */
    public function actionNote($attractionname){
        $response = Note::findOne(['chapterText' => $attractionname]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/photo
     */
    public function actionPhoto(){
        $allPhotos = Pagephoto::findAll(['namePage' => 'attraction']);

        $response = array();
        foreach ($allPhotos as $photo){
            if (str_replace('Content', '', $photo['photo']) != $photo['photo']){
                array_push($response, $photo);
            }
        }

        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/comments
     */
    public function actionComments(){
        $response = Comment::find()->orderBy('date DESC')->all();
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/edit_comment?accesstoken=6178217fa7823c6070b4&id=0&text=sometext
     */
    public function actionEdit_comment($accesstoken, $id, $text){
        $user = User::findOne(['accessToken' => $accesstoken]);

        if ($user != null){
            $comment = Comment::findOne(['id' => $id]);
            $username = $user['login'];
            if ($username == $comment['username']){
                $comment->text = $text;
                $comment->save();
                return $comment;
            } 
        }
        
        $response = ['data' => null];
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/new_comment?accesstoken=6178217fa7823c6070b4&text=sometext
     */
    public function actionNew_comment($accesstoken, $text){
        $username = User::findOne(['accessToken' => $accesstoken])['login'];
        $comment = new Comment();
        $comment->username = $username;
        $comment->date = Yii::$app->formatter->asDatetime(time() + 60*60*3, 'php:Y-m-d H:i:s');
        $comment->text = $text;
        $comment->save();
        return $comment;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/delete_comment?accesstoken=6178217fa7823c6070b4&id=0
     */
    public function actionDelete_comment($accesstoken, $id){
        $user = User::findOne(['accessToken' => $accesstoken]);

        if ($user != null){
            $comment = Comment::findOne(['id' => $id]);
            $username = $user['login'];
            if ($username == $comment['username']){
                $comment->delete();
                return ['status' => "success"];
            } 
        }
        
        $response = ['status' => null];
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/ids
     */
    public function actionIds(){
        $response = Attraction::findBySql('SELECT id FROM attraction')->all();
        $idArray = array();
        foreach ($response as $idObject){
            array_push($idArray, $idObject['id']);
        }

        return $idArray;
    }

}