<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 02.11.2018
 * Time: 13:33
 */

namespace app\components;


use app\modules\admin\models\Post;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class PostHelpers
{
    public static function statusList()
    {
        return [
            Post::STATUS_NEW => 'Новая',
            Post::STATUS_PUBLISHED => 'Опубликована',
            Post::STATUS_INACTIVE => 'Неактивна'
        ];
    }

    public static function statusName($status)
    {
        return ArrayHelper::getValue(self::statusList(), $status);
    }

    public static function statusLabel($status)
    {
        switch ($status) {
            case Post::STATUS_NEW:
                break;
            case Post::STATUS_PUBLISHED:
                break;
            case Post::STATUS_INACTIVE:
                break;
        }

        return Html::tag('span', ArrayHelper::getValue(self::statusList(), $status), []);
    }
}