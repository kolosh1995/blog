<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 17.10.2018
 * Time: 17:13
 */

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;

class AppAdminController extends Controller
{
    public function behaviors()
    {
        return[
        'access'=>[
            'class'=>AccessControl::className(),
            'rules'=>[[
                'allow'=>true,
                'roles'=>['@']
                    ]
                ]
            ]
        ];
    }

}