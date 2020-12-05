<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\User;
use Yii;


class UserController extends ApiController
{

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/user/all
     */
    public function actionAll(){   
        $response = User::find()->all();
        return $response;
    }

    
    /**
     * Пример запроса:
     * POST http://127.0.0.1:1199/api/v1/user/signin
     * body:{
     * "login": "alexey",
     * "password": 12345
     * }
     */
    public function actionSignin(){

        $login = Yii::$app->request->getBodyParam('login');
        $password = Yii::$app->request->getBodyParam('password');

        // Проверка валидности пользователя
        $user = User::findOne(['login' => $login]);
        if ($user == null){
            return false;
        }

        // Проверка правильности пароля для пользователя
        // hash = $user['password']
        if (!(Yii::$app->getSecurity()->validatePassword($password, $user['password']))){
            return false;
        }

        // Генерация токена
        while (true){
            $token = bin2hex(random_bytes(10));
            $userWithSameToken = User::findOne(['accessToken' => $token]);
            if ($userWithSameToken != null){
                continue;
            }else{
                $user->accessToken = $token;
                $user->save();
                break;
            }
        }

        return $user->accessToken;
    }


    /**
     * Пример запроса:
     * POST http://127.0.0.1:1199/api/v1/user/signup
     * body:{
     * "login": "newuser",
     * "password": 12345
     * }
     */
    public function actionSignup(){

        $login = Yii::$app->request->getBodyParam('login');
        $password = Yii::$app->request->getBodyParam('password');

        $user = User::findOne(['login' => $login]);
        if ($user != null){
            return [
                'statusText' => "Пользователь с таким логином уже существует"
            ];
        }

        $model = new User();
        $model->login = $login;
        $model->password = $password;
        while (true){
            $token = bin2hex(random_bytes(10));
            $userWithSameToken = User::findOne(['accessToken' => $token]);
            if ($userWithSameToken != null){
                continue;
            }else{
                $model->accessToken = $token;
                break;
            }
        }
        $model->save();

        return $model->accessToken;
    }


    /**
     * Пример запроса:
     * POST http://127.0.0.1:1199/api/v1/user/exit
     * body:{
     * "token": "f93d995e3b54c397c3a3",
     * }
     */
    public function actionExit(){

        $token = Yii::$app->request->getBodyParam('token');

        $user = User::findOne(['accessToken' => $token]);
        $user->accessToken = null;
        $user->save();
        return $user;
    }

    /**
     * Пример запроса:
     * POST http://127.0.0.1:1199/api/v1/user/is_valid_token
     * body:{
     * "token": "e14da1b018b662b2a0c9",
     * }
     */
    public function actionIs_valid_token(){

        $token = Yii::$app->request->getBodyParam('token');

        $user = User::findOne(['accessToken' => $token]);
        if ($user != null){
            return true;
        }
        return false;
    }

}