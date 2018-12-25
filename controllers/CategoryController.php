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
    public function actionView($name)
    {
        $query = Post::find()->joinWith('category')->where(['category.name' => $name]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 5,
            'forcePageParam' => false,
            'pageSizeParam' => false]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('view', compact('posts', 'pages'));
    }

    public function actionPost($id)
    {
        return $this->render('post', [

            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

    }

}