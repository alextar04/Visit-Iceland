<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%note}}`.
 */
class m201117_142235_create_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%note}}', [
            'id' => $this->primaryKey(),
            'idCity' => $this->integer()->comment('Название города'),
            'chapterText' => $this->string(100)->notNull()->comment('Название раздела'),
            'text' => $this->text()->notNull()->comment('Текст'),
            'keyword' => $this->string()->notNull()->comment('Ключевые слова'),
            'photoPath' => $this->string()->comment('Путь к изображению'),
        ]);

        $this->addForeignKey(
            'fk-note-idCity',
            'note',
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
            'fk-note-idCity',
            'note'
        );
        $this->dropTable('{{%note}}');
    }
}
