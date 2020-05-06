<?php

namespace App\Http\Controllers;

use App\Usuario;

class UsuarioController extends ApiController
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

  protected function getModelClass()
  {
    return Usuario::class;
  }

}