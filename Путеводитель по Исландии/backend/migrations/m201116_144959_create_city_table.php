<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m201116_144959_create_city_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey()->notNull(),
            'name' => $this->string(128)->notNull()->comment('Название'),
            'engName' => $this->string(128)->notNull()->comment('Латинское название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }
}
