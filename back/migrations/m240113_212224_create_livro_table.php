<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%livro}}`.
 */
class m240113_212224_create_livro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%livro}}', [
            'id' => $this->primaryKey(),
            'titulo' => $this->string()->notNull(),
            'descricao' => $this->text(),
            'autor' => $this->string(),
            'numero_paginas' => $this->integer(),
            'data_cadastro' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%livro}}');
    }
}
