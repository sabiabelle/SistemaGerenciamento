@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/5.png"> Permissão de usuário </h2>
    <br>
    <div class="alerts">
        @if (session('success'))
        <div class="alert alert-success">
            <img src="/icons/ok.png">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>

    <div class="alerts">
        @if (session('danger'))
        <div class="alert alert-danger">
            <img src="/icons/error.png">
            {{ session('danger') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>


    <form name="permissao-edit" method='POST' action="/usuarios/{{$users->id}}/update">

        @csrf()

        <h4> <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-key" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
            </svg> Atribuindo nova permissão de acesso</h4>

        <input type="hidden" value="{{$users->id}}" name="id_pessoa">
        <hr>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label><img src="/icons/cpf.png"> Permissão atual:</label>
                <input class="form-control" type="text" value="{{$users->user_type}}" readonly name="">
            </div>
            <div class="form-group col-md-4">
                <label for="descricao"><img src="/icons/user.png"> Nome:<b style="color: red;">*</b></label>
                <input class="form-control" type="text" value="{{$users->name}}" name="name">
            </div>

            <div class="form-group col-md-4">
                <label for=""><img src="/icons/cpf.png">Tipo de usuario:<b style="color: red;">*</b></label>
                <select class="form-control" name="user_type" id="user_type" require>
                    <option value="" selected> Selecione</option>
                    <option value="gerente">GERENTE</option>
                    <option value="funcionario">FUNCIONÁRIO</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="padding-right: 8px;">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg> Atualizar</button>


        <a href="/usuarios" class="btn btn-danger">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg> Cancelar</a>
    </form>
</div>
</div>


@endsection