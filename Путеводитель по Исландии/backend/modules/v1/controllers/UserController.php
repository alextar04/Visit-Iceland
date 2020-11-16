<?php

namespace app\modules\v1\controllers;
use app\modules\v1\models\User;


class UserController extends ApiController
{
    /**
     * Пример запроса:
     * http://127.0.0.1:1199/api/v1/user/all
     */
    public function actionAll(){   
        $userObject = new User();
        return $userObject -> dataTable();
    }

}