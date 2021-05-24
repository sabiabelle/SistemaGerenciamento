<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Atendimento;
use App\Saidas;
use App\Fluxo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    
        $fluxos = Fluxo::all();
        $fluxos_pag = Fluxo::paginate(10);

        $data = date('Y-m-d');
        $usuario_logado = Auth::user();

        $quantidade = Atendimento::where('data_atendimento',$data)->count(); 

       // $entradas =  DB::select('SELECT SUM(valor_pago) AS valor_pago FROM atendimento');

       $entradas = Atendimento::where('data_atendimento',$data);  
       $soma_entradas = $entradas->sum('valor_pago'); 
    
       $saidas = Saidas::where('data_registro', $data);
       $soma_saidas = $saidas->sum('valor');
       $saldo = $soma_entradas - $soma_saidas;
  
        return view('home', compact('fluxos','fluxos_pag', 'usuario_logado','soma_entradas','soma_saidas','saldo','quantidade'));
    }
}