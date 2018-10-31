<?php

use yii\db\Migration;

/**
 * Class m181031_145009_data
 */
class m181031_145009_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ .'data.sql'));
    }

}
