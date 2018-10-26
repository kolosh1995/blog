<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m181024_153319_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('post', [
            'id' => $this->primaryKey()->unique(),
            'author_id' => $this->integer()->notNull(), //Автор
            'category_id' => $this->integer()->notNull(), //Номер категории
            'title' => $this->string()->notNull(), // Название статьи
            'description' => $this->text()->notNull(),//Описание
            'status' => $this->string()->notNull()->defaultValue('new'),//Статус статьи
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'image' => $this->integer(),
            'slug'=> $this->string()->notNull(),//URL
        ], $tableOptions);
        //Cвязи autрor_id
        $this->createIndex(
            'idx-post-author_id',
            'post',
            'author_id'
        );

        $this->addForeignKey(
            'fk-post-author_id',
            'post',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );
        //Cвязи category_id
        $this->createIndex(
            'idx-post-category_id',
            'post',
            'category_id'
        );

        $this->addForeignKey(
            'fk-post-category_id',
            'post',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
    }

    public function Down()
    {
        $this->dropForeignKey(
            'fk-post-author_id',
            'post'
        );

        $this->dropIndex(
            'idx-post-author_id',
            'post'
        );

        $this->dropForeignKey(
            'fk-post-category_id',
            'post'
        );

        $this->dropIndex(
            'idx-post-category_id',
            'post'
        );

        $this->dropTable('post');
    }
}
