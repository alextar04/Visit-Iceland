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
     * http://127.0.0.1:1199/api/v1/user/signin?login=alexey&password=qqwer
     */
    public function actionSignin($login, $password){
        // Проверка валидности пользователя
        $user = User::findOne(['login' => $login, 'password' => $password]);
        if ($user == null){
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
     * http://127.0.0.1:1199/api/v1/user/signup?login=alexey&password=qqwer
     */
    public function actionSignup($login, $password){
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
     * http://127.0.0.1:1199/api/v1/user/exit?token=e14da1b018b662b2a0c9
     */
    public function actionExit($token){
        $user = User::findOne(['accessToken' => $token]);
        $user->accessToken = null;
        $user->save();
        return $user;
    }

    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/user/is_valid_token?token=e14da1b018b662b2a0c9
     */
    public function actionIs_valid_token($token){
        $user = User::findOne(['accessToken' => $token]);
        if ($user != null){
            return true;
        }
        return false;
    }

}