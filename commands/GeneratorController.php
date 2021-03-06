<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 05.11.2018
 * Time: 12:12
 */

namespace app\commands;

use app\models\Category;
use app\models\Post;
use app\models\User;
use yii\console\Controller;

class GeneratorController extends Controller
{
    public function actionGen()
    {
        $input = array(
            "Психология",
            "Ремонт и дизайн",
            "Экономика недвижимости",
            "Обзоры эксклюзивных объектов",
            "Финансы",
            "Авто",
            "Исследования",
            "Интервью",
            "Свежие новости",
            "Хороший вопрос"
        );
        $title = array(
            "Авто",
            "Радиоизлучение",
            "Галакти",
            "Открытия дискретных источников",
            "Галактики"
        );
        $description = array(
            "Исследованиям радиозвезд их радиоизлучение можно надеяться. Обнаруживают концентрацию к галактическому экватору много усилий величины. Намного меньше толщины галактики. Так как и в том, что дискретными источниками радиоизлучения обнаруживалось бы. именно. Искать в радиоизлучений расстояний и следовало. Небе близко друг к галактики.",
            "Ярких галактик очень близкие звезды, расстояния которых намного. Звезды, расстояния которых намного меньше толщины галактики. Или менее равномерно, без признаков концентраций к ее плоскости. Лишь тех объектов нет, а разрешающая сила. Зарегистрированное радиоизлучение можно надеяться на отождествление лишь.",
            "Велико и в этом случае. Проявляли себя в узкой полосе около. Поэтому соответствующий источнику радиоизлучения первой труппы, как звезды, расстояния которых. Ожидать, являются очень близкими звездами. После открытия дискретных источников каждая из источников располагающихся. Внегалактические объекты, например звезды первой. Прозрачна, радиоизлучение которого достаточно сильное источники радиоизлучения, не проявляли себя.",
            "Несколько странное обстоятельство первые годы после открытия дискретных источников. Сила радиотелескопов неве­лика, все действующие. Объект нужно искать в этом случае поглощение света очень близкие. Действующие точечные радиоисточники слились. Звездной величины, никак не об­наруживают галактической концентрации этих источников радиоизлучения оптический объект."
        );

        for ($i = 1; $i <= 50; $i++) {
            $category = new Category();
            $category->name = $res = $input[array_rand($input)];
            $category->parent_id = rand(1, 5);
            $category->save();
            echo 'added, id: ' . $category->id . PHP_EOL;
        }

        for ($i = 1; $i <= 15; $i++) {
            $user = new User();
            $user->username = 'user' . $i;
            $user->password = \Yii::$app->security->generatePasswordHash(12345);
            $user->save();
            echo 'added, id: ' . $user->id . PHP_EOL;
        }

        for ($i = 1; $i <= 200; $i++) {
            $post = new Post();
            $post->author_id = rand(1, 5);
            $post->category_id = rand(1, 30);
            $post->title = $res = $title[array_rand($title)];
            $post->description = $res = $description[array_rand($description)];
            $post->save();
            echo 'added, id: ' . $post->id . PHP_EOL;
        }
    }
}
