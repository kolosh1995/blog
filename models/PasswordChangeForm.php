<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 25.10.2018
 * Time: 13:53
 */

namespace app\models;

use yii\base\Model;
use Yii;

class PasswordChangeForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $newPasswordRepeat;

    private $_user;

    public function __construct(User $user, $config = [])
    {
        $this->_user = $user;
        parent::__construct($config);
    }

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'newPasswordRepeat'], 'required'],
            ['currentPassword', 'currentPassword'],
            ['newPassword', 'string', 'min' => 6],
            ['newPasswordRepeat', 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword' => 'Ведите новый пароль',
            'newPasswordRepeat' => Yii::t('app', 'Повторите пароль'),
            'currentPassword' => Yii::t('app', 'Введите текущий пароль'),
        ];
    }

    public function currentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if (!$this->_user->validatePassword($this->$attribute)) {
                $this->addError($attribute, Yii::t('app', 'Неправильно введен текущий пароль'));
            }
        }
    }

    public function changePassword()
    {
        if ($this->validate()) {
            $user = $this->_user;
            $user->password = \Yii::$app->security->generatePasswordHash($this->newPassword);
            return $user->save();
        } else {
            return false;
        }
    }
}