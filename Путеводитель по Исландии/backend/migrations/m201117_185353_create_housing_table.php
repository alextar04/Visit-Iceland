<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%housing}}`.
 */
class m201117_185353_create_housing_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%housing}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%housing}}');
    }
}
