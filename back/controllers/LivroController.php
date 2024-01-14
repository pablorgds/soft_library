<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;
use yii\data\ActiveDataProvider;
use app\models\Livro;
use Yii;

class LivroController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $livros = Livro::find();

        return new ActiveDataProvider([
            'query' => $livros,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
    }

    public function actionCreate()
    {
        $livro = new Livro();
        $livro->load(Yii::$app->request->post(), '');

        if ($livro->save()) {
            return ['status' => 'success', 'message' => 'Livro adicionado com sucesso'];
        } else {
            return ['status' => 'error', 'message' => 'Erro ao adicionar livro', 'errors' => $livro->errors];
        }
    }

    public function actionUpdate($id)
    {
        $livro = Livro::findOne($id);

        if ($livro === null) {
            return ['status' => 'error', 'message' => 'Livro não encontrado'];
        }

        $livro->load(Yii::$app->request->post(), '');

        if ($livro->save()) {
            return ['status' => 'success', 'message' => 'Livro atualizado com sucesso'];
        } else {
            return ['status' => 'error', 'message' => 'Erro ao atualizar livro', 'errors' => $livro->errors];
        }
    }

    public function actionDelete($id)
    {
        $livro = Livro::findOne($id);

        if ($livro === null) {
            return ['status' => 'error', 'message' => 'Livro não encontrado'];
        }

        if ($livro->delete()) {
            return ['status' => 'success', 'message' => 'Livro deletado com sucesso'];
        } else {
            return ['status' => 'error', 'message' => 'Erro ao deletar livro'];
        }
    }
}
