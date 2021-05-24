<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
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
            $name = $_GET['busca'];
            $user = User::where('name', 'like', '%' . $name . '%')->get();    
        }else{
            $user = User::all();
             
        }

        if(\Gate::allows('gerente')){
        $usuario_logado = Auth::user();
          return view('usuarios.index',compact('user','usuario_logado'));
        }else {
            return redirect()->route('home')
            ->with('danger', 'Acesso negado!');
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('usuarios.create');
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
            'name' => 'required',
            'user_type' => 'required',
            'email' => 'required',
            'password' => 'required',  
        ]);
        
        if ($validator->fails()) {
            return redirect('usuarios/create')
            ->withErrors($validator)
            ->withInput();
        }
        
        $users = new User();  
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request['password']);
        $users->user_type = $request->user_type;
        $users->save();

        return redirect()->route('usuarios.index')
        ->with('success', 'Permissão do usuário atualizada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if(\Gate::allows('gerente')){

            $users = User::find($id);
            return view ('usuarios.edit', compact('users'));

        }else {
            return redirect()->route('home')->with('danger', 'Acesso negado!');
        }
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
            'name' => 'required',
            'user_type' => 'required', 
        ]);
        
        if ($validator->fails()) {
            return redirect('usuarios/'.$id.'/edit')
            ->withErrors($validator)
            ->withInput();
        }
        
        $users = User::find($id);  
        $users->name = $request->name;
        $users->user_type = $request->user_type;
        $users->update();

        return redirect()->route('usuarios.index')
        ->with('success', 'Permissão do usuário atualizada!');
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
        $users = User::find($id);
        $users->delete();
        return redirect()->route('usuarios.index')
        ->with('success', 'Usuario excluído do sistema!');
    }
}