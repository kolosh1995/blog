<?php

use yii\widgets\LinkPager;

$this->title = 'Статьи'
?>

<div class="col-sm-3">
    <div class="left-sidebar">
        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']); ?>
    </div>
</div>

<h2 class="title text-center"> Статьи</h2>
<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="col-sm-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href=""><?= $post->title ?></a></h3>
                </div>
                <div class="panel-body">

                    <?= $post->description ?>
                </div>
                <div class="panel-footer ">
                    <span class="text-danger"> Автор: <?= $post->author->username ?></span>
                    <span class="text-success"> Категория: <?= $post->category->name ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h2>Здесь статей пока нет</h2>
<?php endif; ?>
<div class="col-sm-9">
    <?= LinkPager::widget([
        'pagination' => $pages,
    ]); ?>
</div>