<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Cliente;
use App\User;
use App\Fluxo;
use App\Servicos;
use App\Atendimento;

class AtendimentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        if(isset($_GET['busca'])){

            $nome = $_GET['busca'];
            $clientes = Cliente::where('nome', 'like', '%' . $nome . '%')->orderBy('id', 'asc')->get();
        
        }else{
            $clientes = Cliente::orderBy('id', 'desc')->get();
        }

            $clientes_pag = Cliente::paginate(10);
            return view ('atendimentos.index', compact('clientes','clientes_pag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $clientes = Cliente::find($id); 
        $users = User::all();
        $servicos = Servicos::all();

        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $usuario_logado = Auth::user();

        return view ('atendimentos.create', compact('clientes','data','hora','users', 'usuario_logado','servicos'));

    }

    public function registros()
    {  
        $atendimentos = Atendimento::all();
        $users = User::all();

        return view ('atendimentos.registros', compact('atendimentos','users'));
    }
    
    public function entradas()
    {  
        $atendimentos = Atendimento::orderBy('id', 'desc')->get();
        $atendimentos_pag = Atendimento::paginate(10);

        return view ('atendimentos.entradas', compact('atendimentos','atendimentos_pag'));
    }

    public function nota_fiscal($id)
    { 
        $atendimentos = Atendimento::find($id);
        $usuario_logado = Auth::user();

        return view ('atendimentos.nota_fiscal', compact('atendimentos','usuario_logado'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valor_pago' => 'required',
            'forma_pagamento' => 'required',
            'registrado_por' => 'required',
            'cliente_id' => 'required',
            'servicos_id' => 'required',
            'user_id' => 'required',

        ]);
        
        if ($validator->fails()) {
            return redirect('atendimentos'.$id.'/create')
            ->withErrors($validator)
            ->withInput();
        }

        $atendimentos = new Atendimento();        
        $atendimentos->servicos_id = $request->servicos_id;
        $atendimentos->user_id = $request->user_id;
        $atendimentos->cliente_id = $request->cliente_id;
        $atendimentos->valor_pago = $request->valor_pago;
        $atendimentos->forma_pagamento = $request->forma_pagamento;
        $atendimentos->data_atendimento = $request->data_atendimento;
        $atendimentos->registrado_por = $request->registrado_por;
        $atendimentos->save();

        $fluxo = new Fluxo();
        $fluxo->valor = $atendimentos->valor_pago;
        $fluxo->data_registro = $atendimentos->data_atendimento;
        $fluxo->registrado_por = $atendimentos->registrado_por;
        $fluxo->tipo_registro = 2;
        $fluxo->save();

        return redirect()->route('atendimentos.index')
        ->with('success', 'Atendimento registrado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $func = $id;
        $atendimentos = Atendimento::all();
        $atendimentos_pag = Atendimento::paginate(10);

        return view('atendimentos.show', compact('atendimentos','atendimentos_pag','func'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}