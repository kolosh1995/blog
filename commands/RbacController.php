<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 19.10.2018
 * Time: 11:13
 */

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\modules\admin\rbac\Rbac as AdminRbac;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->getAuthManager();
        $auth->removeAll();

        $adminPanel = $auth->createPermission(AdminRbac::PERMISSION_ADMIN_PANEL);
        $adminPanel->description = 'Admin panel';
        $auth->add($adminPanel);

        $userPanel = $auth->createPermission(AdminRbac::PERMISSION_USER_PANEL);
        $userPanel->description = 'User panel';
        $auth->add($userPanel);

        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        $auth->addChild($admin, $user);
        $auth->addChild($admin, $adminPanel);

        $this->stdout('Done!' . PHP_EOL);
    }
}