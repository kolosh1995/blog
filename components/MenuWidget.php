<?php
/**
 * Created by PhpStorm.
 * User: kolos
 * Date: 30.10.2018
 * Time: 16:44
 */

namespace app\components;

use yii\base\Widget;
use app\models\Category;

class MenuWidget extends Widget
{
    public $tpl;
    public $date;  // Категории
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ( $this->tpl === null ) {
             $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $this->date = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
       // debug($this->date);
        return $this->menuHtml;
    }

    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category)
        {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->date as $id=>&$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->date[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
}