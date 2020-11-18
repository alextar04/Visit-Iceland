<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%kitchen}}`.
 */
class m201117_185410_create_kitchen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%kitchen}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%kitchen}}');
    }
}
