<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Validator;

use App\Http\Controllers\API\BadwordsController;

class ContatoController
{
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

        if ($validator->fails()) {
            return $this::enviarRespostaErro('Campo incorreto', $validator->errors());
        };
        
        // Filtro de palavrão
        $request->empresa = BadwordsController::verify($request->empresa);
        $request->mensagem = BadwordsController::verify($request->mensagem);

        $contato = Contato::create([
            'assunto' => $request->assunto,
            'nome' => $request->nome,
            'empresa' => $request->empresa,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'mensagem' => $request->mensagem
        ]);

        return "Mensagem enviada com sucesso!";
    }
}