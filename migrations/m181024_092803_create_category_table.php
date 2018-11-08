<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m181024_092803_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {$tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' =>$this->integer()->defaultValue(0),
            'keywords' => $this->string()->Null(),
            'description' => $this->string()->Null()
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('category');
    }
}
