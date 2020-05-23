<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

  /**
  * Tabela para o modelo
  *
  * @var string
  */
  protected $table = 'usuario';

  protected $fillable = ['id', 'login', 'email', 'nome'];

  /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'senha'
  ];
}