<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video}}`.
 */
class m201118_074921_create_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'link' => $this->string(512)->notNull()->comment('Ссылка')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video}}');
    }
}
