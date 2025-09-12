<?php

namespace App\Http\Controllers;

use App\Models\Membro;
use Illuminate\Http\Request;

class MembroController extends Controller
{
     public function store(Request $request)
    {
        $membro = Membro::create([
            'nome_completo' => $request->nome_completo,
            'endereco' => $request->endereco,
            'telefone' => $request->telefone,
            'data_cadastro' => $request->data_cadastro
        ]);

        return response()->json($membro);
    }

    public function index()
    {
        $membro = Membro::all();

        return response()->json($membro);
    }
}
