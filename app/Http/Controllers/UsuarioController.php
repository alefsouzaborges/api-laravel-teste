<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
   
    public function index()
    {
        return usuarios::all();
    }

    public function store(Request $request)
    {
        $user = new usuarios();
        $user->nome  = $request['nome'];
        $user->email = $request['email'];
        $user->senha = md5($request['senha']);
        $user->save();
        
        try {
            return response()->json(array('success' => true, 'response' => $user));
        } catch (Exception $e) {
            return response()->json(array('success' => true, 'response' => $e));
        }
    }

    public function show($id)
    {
        
        $user = DB::select("SELECT * FROM usuarios WHERE id = '${id}'");

        if($user){
            return response()->json(array('success' => true, 'response' => $user));
        }else{
            return response()->json(array('success' => false, 'response' => 'Usuário não encontrado!'));
        }
       
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

        $user = DB::select("DELETE FROM usuarios WHERE id = '${id}'");
        
        if(!$user){
            return response()->json(array('success' => true, 'response' => 'Usuário deletado com sucesso!'));
        }else{
            return response()->json(array('success' => false, 'response' => 'Usuário não encontrado!'));
        }

    }
}
