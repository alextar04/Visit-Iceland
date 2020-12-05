<?php

namespace app\modules\v1\models;
use Yii;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login Логин
 * @property string $password Пароль
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login', 'password'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function beforeSave($insert){
        if (parent::beforeSave($insert)){
            // Сгенерировать хэш пароля для нового пользователя 
            if ($insert){
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        }
        return false;
    }
}
