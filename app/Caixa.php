<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{
    protected $table = 'caixa';

    protected $fillable = [ 'data_registro','valor','registrado_por','status_caixa'];
}