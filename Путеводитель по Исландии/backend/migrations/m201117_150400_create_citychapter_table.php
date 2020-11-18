<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%citychapter}}`.
 */
class m201117_150400_create_citychapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%citychapter}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->comment('Название'),
            'link' => $this->string(128)->notNull()->comment('Ссылка')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%citychapter}}');
    }
}
