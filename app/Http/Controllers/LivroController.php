<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function store(Request $request)
    {
        $livro = Livro::create([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'genero' => $request->genero,
            'autor_id' => $request->autor_id
        ]);

        return response()->json($livro);
    }

    public function index()
    {
        $livro = Livro::all();

        return response()->json($livro);
    }

    public function update(Request $request)
    {

        $livro = Livro::find($request->id);

        if ($livro == null) {
            return response()->json([
                'erro' => 'Livro não encontrado'
            ]);
        }

        if (isset($request->titulo)) {
            $livro->titulo = $request->titulo;
        }

        if (isset($request->ano_publicacao)) {
            $livro->ano_publicacao = $request->ano_publicacao;
        }

        if (isset($request->genero)) {
            $livro->genero = $request->genero;
        }

        if (isset($request->autor_id)) {
            $livro->autor_id = $request->autor_id;
        }

        $livro->update();

        return response()->json([
            'mensagem' => 'atualizada'
        ]);
    }

    public function show($id)
    {

        $livro = Livro::find($id);

        if ($livro == null) {
            return response()->json([
                'erro' => 'Livro não encontrado'
            ]);
        }
        return response()->json($livro);
    }

    public function delete($id)
    {

        $livro = Livro::find($id);

        if ($livro == null) {
            return response()->json([
                'erro' => 'Livro não encontrado'
            ]);
        }

        $livro->delete();

        return response()->json([
            'mensagem' => 'excluido'
        ]);
    }
}
