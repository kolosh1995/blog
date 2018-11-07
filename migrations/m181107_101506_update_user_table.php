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
        $this->alterColumn('user', 'auth_key', 'string NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        echo "m181107_101506_update_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181107_101506_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
