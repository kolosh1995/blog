<?php

use yii\db\Migration;

/**
 * Class m181107_150540_add_user
 */
class m181107_150540_add_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->batchInsert('user', ['username','password', 'role'],[
            ['admin', \Yii::$app->security->generatePasswordHash(12345), 'admin'],
            ['user1', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user2', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user3', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user4', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user5', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user6', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user7', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user8', \Yii::$app->security->generatePasswordHash(12345), 'user'],
            ['user9', \Yii::$app->security->generatePasswordHash(12345), 'user']
        ]);
        $this->batchInsert('category', ['name'],[
            ['Исследования'],
            ['Ремонт и дизайн'],
            ['Свежие новости'],
            ['Финансы'],
            ['Авто'],
        ]);
        $this->batchInsert('post', ['author_id', 'category_id', 'title', 'description'], [
            [1, 1, 'Открытия дискретных источников', 'Ярких галактик очень близкие звезды, расстояния которых намного. Звезды, расстояния которых намного меньше толщины галактики. Или менее равномерно, без признаков концентраций к ее плоскости. Лишь тех объектов нет, а разрешающая сила. Зарегистрированное радиоизлучение можно надеяться на отождествление лишь.'],
            [2, 2, 'Радиоизлучение', 'Несколько странное обстоятельство первые годы после открытия дискретных источников. Сила радиотелескопов неве&shy;лика, все действующие. Объект нужно искать в этом случае поглощение света очень близкие. Действующие точечные радиоисточники слились. Звездной величины, никак не об&shy;наруживают галактической концентрации этих источников радиоизлучения оптический объект.'],
            [3, 2, 'Авто', 'Несколько странное обстоятельство первые годы после открытия дискретных источников. Сила радиотелескопов неве­лика, все действующие. Объект нужно искать в этом случае поглощение света очень близкие. Действующие точечные радиоисточники слились. Звездной величины, никак не об­наруживают галактической концентрации этих источников радиоизлучения оптический объект.'],
        ]);
    }



    /**
     * {@inheritdoc}
     */
    public function Down()
    {

    }
}
