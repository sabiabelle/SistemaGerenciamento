<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class atendimento extends Model
{
    //
    protected $table = 'atendimento';

    protected $fillable = [ 'cliente_id','servicos_id','user_id','data_atendimento','valor_pago','registrado_por','forma_pagamento'];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function clientes()
	{
		return $this->belongsTo('App\Cliente','cliente_id');
    }
    
    public function servicos()
	{
		return $this->belongsTo('App\Servicos','servicos_id');
	}

}