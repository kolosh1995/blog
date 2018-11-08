<?php

use yii\db\Migration;

/**
 * Class m181107_101506_update_user_table
 */
class m181107_101506_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->alterColumn('user', 'auth_key', $this->string(32));
        $this->alterColumn('user', 'created_at', $this->integer());
        $this->alterColumn('user', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->alterColumn('user', 'auth_key', $this->string(32)->notNull());
        $this->alterColumn('user', 'created_at', $this->integer()->notNull());
        $this->alterColumn('user', 'updated_at', $this->integer()->notNull());
    }

}
