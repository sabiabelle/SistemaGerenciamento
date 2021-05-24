<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Cliente;
use App\Event;

class ClienteController extends Controller
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
            return view ('clientes.index', compact('clientes','clientes_pag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('clientes.create');
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
            'nome' => 'required',
            'celular' => 'required',
            'data_nasc' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('clientes/create')
            ->withErrors($validator)
            ->withInput();
        }

        $clientes = new Cliente();        
        $clientes->cpf = $request->cpf;
        $clientes->nome = $request->nome;
        $clientes->telefone = $request->telefone;
        $clientes->data_nasc = $request->data_nasc;
        $clientes->celular = $request->celular;
        $clientes->instagram = $request->instagram;
        $clientes->save();

        return redirect()->route('clientes.index')
        ->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $mes = date('m');
    
        $clientes = Cliente::whereMonth('data_nasc', '=', $mes)->orderBy('data_nasc', 'asc')->get();

        return view ('clientes.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $clientes = Cliente::find($id); 
        return view ('clientes.edit', compact('clientes'));
        
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
       
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'celular' => 'required',
            'data_nasc' => 'required',
           
        ]);
        
        if ($validator->fails()) {
            return redirect('clientes'.$id.'edit')
            ->withErrors($validator)
            ->withInput();
        }
       
        $clientes = Cliente::find($id);  

        $clientes->cpf = $request->cpf;
        $clientes->nome = $request->nome;
        $clientes->telefone = $request->telefone;
        $clientes->data_nasc = $request->data_nasc;
        $clientes->celular = $request->celular;
        $clientes->instagram = $request->instagram;
        $clientes->update();

        return redirect()->route('clientes.index')
        ->with('success', 'Os dados do cliente foram atualizados!');
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
        $clientes = Cliente::find($id);
        $clientes->delete();
        return redirect()->route('clientes.index')
        ->with('success', 'Usuario excluído do sistema!');
    }
}