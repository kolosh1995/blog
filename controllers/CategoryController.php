<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 30.10.2018
 * Time: 18:04
 */

namespace app\controllers;

use app\models\Post;
use yii\data\Pagination;
use yii\web\Controller;

class CategoryController extends Controller
{
    public function actionView($id)
    {
        $query = Post::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 5,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', compact('posts', 'pages'));
    }
}