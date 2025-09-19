<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function store(Request $request)
    {
        $emprestimo = Emprestimo::create([
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
            'codigo_membro' => $request->codigo_membro,
            'codigo_livro' => $request->codigo_livro,
            'membros_id' => $request->membros_id,
            'livros_id' => $request->livros_id
        ]);

        return response()->json($emprestimo);
    }

    public function index()
    {
        $emprestimo = Emprestimo::all();

        return response()->json($emprestimo);
    }

    public function update(Request $request)
    {

        $emprestimo = Emprestimo::find($request->id);

        if ($emprestimo == null) {
            return response()->json([
                'erro' => 'Empréstimo não encontrado'
            ]);
        }

        if (isset($request->data_emprestimo)) {
            $emprestimo->data_emprestimo = $request->data_emprestimo;
        }

        if (isset($request->data_devolucao)) {
            $emprestimo->data_devolucao = $request->data_devolucao;
        }

        if (isset($request->codigo_membro)) {
            $emprestimo->codigo_membro = $request->codigo_membro;
        }

        if (isset($request->codigo_livro)) {
            $emprestimo->codigo_livro = $request->codigo_livro;
        }

        if (isset($request->membros_id)) {
            $emprestimo->membros_id = $request->membros_id;
        }

        if (isset($request->livros_id)) {
            $emprestimo->livros_id = $request->livros_id;
        }

        $emprestimo->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id)
    {

        $emprestimo = Emprestimo::find($id);

        if ($emprestimo == null) {
            return response()->json([
                'erro' => 'Empréstimo não encontrado'
            ]);
        }
        return response()->json($emprestimo);
    }

    public function delete($id)
    {

        $emprestimo = Emprestimo::find($id);

        if ($emprestimo == null) {
            return response()->json([
                'erro' => 'Empréstimo não encontrado'
            ]);
        }

        $emprestimo->delete();

        return response()->json([
            'mensagem' => 'excluido'
        ]);
    }
}
