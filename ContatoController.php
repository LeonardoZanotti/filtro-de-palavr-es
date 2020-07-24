<?php

// Exemplo de controller de contato para usar o filtro

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Validator;          // Validar resposta da requisição
use App\Contato;        // Model

use App\Http\Controllers\API\BadwordsController;    // Controller com as funções de filtrar palavrões

class ContatoController
{
    // Exemplo de função para criar um contato
    public function store(Request $request)
    {
        // Exemplo de requisição de formulário
        $validator = Validator::make($request->all(), [
            'assunto' => 'max:255',
            'nome' => 'required|max:255',
            'email' => 'required|email',
            'mensagem' => 'required|min:6',
            'empresa' => 'max:255',
            'telefone' => 'max:255'
        ]);

        // Verificando se a resposta da requisição está no formato correto
        if ($validator->fails()) {
            return $this::enviarRespostaErro('Campo incorreto', $validator->errors());
        };
        
        // Filtro de palavrão
        $request->empresa = BadwordsController::verify($request->empresa);
        $request->mensagem = BadwordsController::verify($request->mensagem);
        // $textoFiltrado = NomeDoController::verify($textoComPalavrões);

        // Criando o contato com os dados da requisição e textos já filtrados
        $contato = Contato::create([
            'assunto' => $request->assunto,
            'nome' => $request->nome,
            'empresa' => $request->empresa,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'mensagem' => $request->mensagem
        ]);

        // Resposta para o usuário que criou o contato
        return "Mensagem enviada com sucesso!";
    }
}