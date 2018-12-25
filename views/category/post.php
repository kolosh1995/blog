<?php

use yii\widgets\DetailView;


?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'author_id',
            'value' => function ($model) {
                return $model->author->username;
            },
        ],
        [
            'attribute' => 'category_id',
            'value' => function ($model) {
                return $model->category->name;
            },
        ],
        'title',
        'description:html',
        'created_at:datetime',

    ],
]) ?>