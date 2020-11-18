<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\Attraction;
use app\modules\v1\models\Chapter;
use app\modules\v1\models\Note;
use app\modules\v1\models\PagePhoto;
use app\modules\v1\models\Comment;
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
     * http://127.0.0.1:1199/api/v1/attraction/chapter?attractionid=0
     */
    public function actionChapter($attractionid){
        $attractionName = Attraction::findOne(['id' => $attractionid])['name'];
        $response = Chapter::findAll(['text' => $attractionName]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/note?attractionid=0
     */
    public function actionNote($attractionid){
        $chaptername = Attraction::findOne(['id' => $attractionid])['name'];
        $response = Note::findOne(['chapterText' => $chaptername]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/photo
     */
    public function actionPhoto(){
        $response = Pagephoto::findAll(['namePage' => 'attractions']);
        return $response;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/comment?id=0
     */
    public function actionComment($id){
        $response = Comment::findOne(['id' => $id]);
        return $response;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/edit_comment?id=0&text=sometext
     */
    public function actionEdit_comment($id, $text){
        $comment = Comment::findOne(['id' => $id]);
        $comment->text = $text;
        $comment->date = Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
        $comment->save();
        return $comment;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/new_comment?username=alexey&text=sometext
     */
    public function actionNew_comment($username, $text){
        $comment = new Comment();
        $comment->username = $username;
        $comment->date = Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
        $comment->text = $text;
        $comment->save();
        return $comment;
    }


    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/attraction/delete_comment?id=0
     */
    public function actionDelete_comment($id){
        $comment = Comment::findOne(['id' => $id]);
        $comment->delete();
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