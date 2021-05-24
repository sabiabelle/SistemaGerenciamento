<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fluxo extends Model
{
    //
    protected $table = 'fluxo';

    protected $fillable = [ 'data_registro','valor','registrado_por','tipo_registro'];
}