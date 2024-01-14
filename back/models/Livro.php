<?php

namespace app\models;

use yii\db\ActiveRecord;

class Livro extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'livro'; // Substitua com o nome real da sua tabela de livros no banco de dados
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descricao', 'autor', 'numero_paginas'], 'required'],
            [['numero_paginas'], 'integer', 'min' => 1],
            [['titulo', 'descricao', 'autor'], 'string', 'max' => 255],
        ];
    }
}
