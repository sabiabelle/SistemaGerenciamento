<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Fluxo;
use App\Atendimento;
use App\Saidas;
use App\Caixa;

class CaixaController extends Controller
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
        // $fluxos = Fluxo::all();
        $fluxos_pag = Fluxo::paginate(10);

        $caixa = Caixa::all();
        $caixa_pag = Caixa::paginate(10);

        $data = date('Y-m-d');
        $usuario_logado = Auth::user();

        $quantidade = Atendimento::where('data_atendimento',$data)->count(); 

        $status_caixa = Caixa::where('data_registro',$data)->count(); 

       // $entradas =  DB::select('SELECT SUM(valor_pago) AS valor_pago FROM atendimento');

       $entradas = Atendimento::where('data_atendimento',$data); 
       $inicial = Fluxo::where('data_registro',$data)->where('tipo_registro','=',1); 

       $soma_entradas = $entradas->sum('valor_pago'); 
       $valor_inicial = $inicial->sum('valor'); 
    
       $saidas = Saidas::where('data_registro', $data);
       $soma_saidas = $saidas->sum('valor');

       $saldo = $soma_entradas - $soma_saidas;
       $saldo_total = ($soma_entradas + $valor_inicial) - $soma_saidas;
       
       return view('caixa.index', compact('caixa','caixa_pag','status_caixa', 'saldo_total','inicial','data','valor_inicial','usuario_logado','soma_entradas','soma_saidas','saldo','quantidade'));
    }

   

    public function fluxo(Request $request)
    {
        $data = date('Y-m-d');
        $hora = date('H:i:s');
        $usuario_logado = Auth::user();

        return view ('caixa.fluxo', compact('usuario_logado','data','hora'));

    }
    public function historico()
    {
        if(isset($_GET['busca'])){
            $caixa_pag = Caixa::paginate(10);
            $data_registro = $_GET['busca'];
            $caixa = Caixa::where('data_registro', 'like', '%' . $data_registro . '%')->orderBy('id', 'asc')->get();
            return view ('caixa.historico', compact('caixa','caixa_pag'));
        }else{
            $caixa = Caixa::orderBy('id', 'desc')->get();
        }

        $caixa = Caixa::orderBy('id', 'desc')->get();
        $caixa_pag = Caixa::paginate(10);

        return view ('caixa.historico', compact('caixa','caixa_pag'));

    }

    public function registrar_fluxo (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'valor' => 'required',
            'registrado_por' => 'required',
            'data_registro' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('fluxo/create')
            ->withErrors($validator)
            ->withInput();
        }

        $fluxo = new Fluxo();
        $fluxo->valor = $request->valor;
        $fluxo->data_registro = $request->data_registro;
        $fluxo->registrado_por = $request->registrado_por;
        $fluxo->tipo_registro = 1;
        $fluxo->save();

        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $caixa = new Caixa();
        $caixa->valor_inicial = $request->valor_inicial;
        $caixa->entradas_total = $request->entradas_total;
        $caixa->saida_total = $request->saidas_total;
        $caixa->caixa_total = $request->caixa_total;
        $caixa->data_registro = $request->data_registro;
        $caixa->fechado_por = $request->registrado_por;
        $caixa->save();

        return redirect()->route('caixa.index')
        ->with('success', 'Caixa encerrado!');

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