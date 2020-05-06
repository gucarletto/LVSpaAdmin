<?php

namespace App\Http\Controllers;

use App\Rede;

class RedeController extends ApiController
{

  protected function getModelFromRequest(\Illuminate\Http\Request $request)
  {
    $oUsuario = new Rede([
      'apelido' => $request->input('apelido')
      , 'nome' => $request->input('nome')
    ]);
    return $oUsuario;
  }

  protected function getModelClass()
  {
    return Rede::class;
  }

}
