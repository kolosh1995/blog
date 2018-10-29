<?php
use yii\helpers\Html;
use yii\widgets\DetailView;


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

</div>