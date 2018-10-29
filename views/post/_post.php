<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

$this->title = 'Главная';
?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="<?=Url::to(['post/view','id' => $model->id])?>"><?= $model->title?></a></h3>
            </div>
            <div class="panel-body">

                <?= HtmlPurifier::process($model->description) ?>
            </div>
            <div class="panel-footer ">
                <span class="text-danger"> Автор: <?=$model->author->username?></span>
                <span class="text-success"> Категория: <?=$model->category->name?></span>
            </div>
        </div>

