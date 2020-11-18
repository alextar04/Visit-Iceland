<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip}}`.
 */
class m201117_185421_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull()->comment('Название')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trip}}');
    }
}
