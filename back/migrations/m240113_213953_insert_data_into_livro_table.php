<?php

use yii\db\Migration;

/**
 * Class m240113_213953_insert_data_into_livro_table
 */
class m240113_213953_insert_data_into_livro_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->insert('livro', [
                'titulo' => "Livro $i",
                'descricao' => "Descrição do Livro $i",
                'autor' => "Autor $i",
                'numero_paginas' => rand(100, 500),
                'data_cadastro' => '2024-01-12 00:00:00',  // optional, if you want to specify the date
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240113_213953_insert_data_into_livro_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240113_213953_insert_data_into_livro_table cannot be reverted.\n";

        return false;
    }
    */
}
