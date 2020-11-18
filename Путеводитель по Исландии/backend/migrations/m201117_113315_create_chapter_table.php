<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%chapter}}`.
 */
class m201117_113315_create_chapter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%chapter}}', [
            'id' => $this->primaryKey()->notNull(),
            'idCity' => $this->integer()->comment('Название города'),
            'text' => $this->string(100)->notNull()->comment('Текст'),
            'photoPath' => $this->string()->notNull()->comment('Путь к изображению'),
            'link' => $this->string()->notNull()->comment('Ссылка в приложении'),
        ]);

        $this->addForeignKey(
            'fk-chapter-idCity',
            'chapter',
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
            'fk-chapter-idCity',
            'chapter'
        );
        $this->dropTable('{{%chapter}}');
    }
}
