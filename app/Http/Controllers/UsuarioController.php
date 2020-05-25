<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

  protected function getModelFromRequest(\Illuminate\Http\Request $request)
  {
    $oUsuario = new Usuario([
      'nome' => $request->input('nome')
      , 'login' => $request->input('login')
      , 'senha' => $request->input('senha')
    ]);
    return $oUsuario;
  }

  protected function validateRequest(Request $request) {
    Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'], 
    ])->validate();
  }


  protected function getModelClass()
  {
    return Usuario::class;
  }

}