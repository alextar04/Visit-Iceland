<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pagephoto}}`.
 */
class m201117_130109_create_pagephoto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pagephoto}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string()->comment('Надпись'),
            'namePage' => $this->string()->notNull()->comment('Тип страницы'),
            'idCity' => $this->integer()->comment('id города'),
            'photo' => $this->string()->notNull()->comment('Путь к изображению'),
            'link' => $this->string()->comment('Путь к разделу \'Далее\' для главной страницы'),
        ]);

        $this->addForeignKey(
            'fk-photo-idCity',
            'pagephoto',
            'idCity',
            'city',
            'id',
            'NO ACTION',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-photo-idCity',
            'pagephoto'
        );
        $this->dropTable('{{%pagephoto}}');
    }
}
