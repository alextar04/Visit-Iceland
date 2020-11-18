<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attraction}}`.
 */
class m201117_135519_create_attraction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attraction}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(128)->notNull()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%attraction}}');
    }
}
