<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rede extends Model
{
  /**
  * Tabela para o modelo
  *
  * @var string
  */
  protected $table = 'rede';

  protected $fillable = ['apelido', 'nome'];
}
