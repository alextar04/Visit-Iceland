<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%maincontentChapter}}`.
 */
class m201118_075458_create_maincontentChapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%maincontentChapter}}', [
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
        $this->dropTable('{{%maincontentChapter}}');
    }
}
