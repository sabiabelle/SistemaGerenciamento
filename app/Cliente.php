<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = 'cliente';

    protected $fillable = [ 'cpf','nome','data_nasc','celular','telefone','instagram'];

}
