<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 19.10.2018
 * Time: 11:33
 */

namespace app\commands;

//Зробити модель User в Modules
use app\models\User;

use Yii;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\ArrayHelper;

class RolesController extends Controller
{
    //Ролі для юзерів
    public function actionAssign()
    {
        $username = $this->prompt('Username:', ['required'=>true]);
        $user = $this->findModel($username);
        $roleName = $this->select('Role:', ArrayHelper::map(Yii::$app->authManager->getRoles(), 'name', 'description'));
        $authManager = Yii::$app -> getAuthManager();
        $role = $authManager->getRole($roleName);
        $authManager->assign($role, $user->id);
        $this->stdout('Done!' . PHP_EOL);
    }

    public function actionRevoke()
    {
        $username = $this->prompt('Username:', ['required' => true]);
        $user = $this->findModel($username);
        $roleName = $this->select('Role:', ArrayHelper::merge(
            ['all' => 'All Roles'],
            ArrayHelper::map(Yii::$app->authManager->getRolesByUser($user->id), 'name', 'description')));
        $authManager = Yii::$app -> getAuthManager();
        if ($roleName == 'all') {
            $authManager -> revokeAll($user->id);
        } else {
            $role = $authManager->getRole($roleName);
            $authManager->revoke($role, $user->id);
        }
        $this->stdout('Done!' . PHP_EOL);
    }

    public function findModel($username)
    {
        if (!$model = User::findOne(['username' => $username])) {
            throw new Exception('User is not found');
        }
        return $model;
    }
}