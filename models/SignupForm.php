<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 17.10.2018
 * Time: 18:33
 */

namespace app\models;
use yii\base\Model;



class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}