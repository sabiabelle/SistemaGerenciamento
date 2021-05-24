<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saidas extends Model
{
    //
    protected $table = 'saidas';

    protected $fillable = [ 'data_registro','valor','registrado_por'];
}
