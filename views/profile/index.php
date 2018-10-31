<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Личний кабинет');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-profile">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Обновить профиль'), ['update'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Сменить пароль'), ['password-change'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Создать статью'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email',
        ],
    ]) ?>

    <h2>Вашы статьи</h2>

    <?= GridView::widget([
        'dataProvider' => $postDataProvider,

        'columns' => [
            [
                'attribute' => 'author_id',
                'value' => function($model){
                    return $model->author->username;
                },
            ],

            [
                'attribute' => 'category_id',
                'value' => function($model){
                    return $model->category->name;
                },
            ],
            'title',
            'description:html',
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{update}{delete}',
                'buttons' => ['view' => function($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"><b class="fa fa-search-plus"></b></span>',
                        ['post/view', 'id' => $model['id']],
                        ['title' => 'Посмотреть', 'id' => 'modal-btn-view']);
                },
                    'update' => function($id, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"><b class="fa fa-pencil"></b></span>',
                            ['/post/update', 'id' => $model['id']],
                            ['title' => 'Обновить', 'id' => 'modal-btn-view']);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"><b class="fa fa-trash"></b></span>',
                            ['post/delete', 'id' => $model['id']], ['title' => 'Удалить', 'class' => '', 'data'
                            => ['confirm' => 'Вы уверены что хотиде удалить?', 'method' => 'post', 'data-pjax' => false],]);
                    }
                ]
            ],

        ],
    ]); ?>

</div>
