<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Servicos;

class ServicosController extends Controller
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
            $servicos = Servicos::where('nome', 'like', '%' . $nome . '%')->orderBy('id', 'asc')->get();
        }else{
            $servicos = Servicos::orderBy('id', 'desc')->get();
        }

            $servicos_pag =  Servicos::paginate(10);
            return view ('servicos.index', compact('servicos','servicos_pag'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('servicos.create');
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
            'valor' => 'required',
            'descricao' => 'required',
           
        ]);
        
        if ($validator->fails()) {
            return redirect('servicos/create')
            ->withErrors($validator)
            ->withInput();
        }

        $servicos = new Servicos();        
        $servicos->descricao = $request->descricao;
        $servicos->valor = $request->valor;
        $servicos->save();

        return redirect()->route('servicos.index')
        ->with('success', 'Procedimentos cadastrados!');
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
    
            $servicos = Servicos::find($id);
            return view ('servicos.edit',compact('servicos'));
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
            'valor' => 'required',
            'descricao' => 'required',
           
        ]);
        
        if ($validator->fails()) {
            return redirect('servicos/'.$id.'/create')
            ->withErrors($validator)
            ->withInput();
        }

        $servicos = Servicos::find($id);        
        $servicos->descricao = $request->descricao;
        $servicos->valor = $request->valor;
        $servicos->update();

        return redirect()->route('servicos.index')
        ->with('success', 'Registros realizados!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicos = Servicos::find($id);
        $servicos->delete();
        return redirect()->route('servicos.index')
        ->with('success', 'Serviços excluído do sistema!');
    }
}
