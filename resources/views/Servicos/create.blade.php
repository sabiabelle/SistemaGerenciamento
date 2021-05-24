@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/7.png"> Cadastro de serviços</h2>
    <br>
    <div class="alerts">
        @if ($errors->any())
        <div class="alert alert-danger">
            <svg class="bi bi-alert-triangle text-danger" width="32" height="32" viewBox="0 0 20 20" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                ...
            </svg>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <div class="alerts">
        @if (session('warning'))
        <div class="alert alert-success">
            <svg class="bi bi-alert-triangle text-success" width="32" height="32" viewBox="0 0 20 20"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                ...
            </svg>
            {{ session('success') }}
            <butto n type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        @endif
    </div>

    <hr>
    <form class="" action="/servicos/store" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="descricao"><img src="/icons/eye.png"> Nome do procedimento:<b
                        style="color: red;">*</b></label>
                <input class="form-control" type="text" require name="descricao" id="descricao" value="{{old('nome')}}"
                    placeholder="">
            </div>
            <div class="form-group col-md-4">
            <label for="descricao"><img src="/icons/real.png"> Valor:</label>
                <div class="input-group-prepend">
                    <span class="input-group-text"><b>R$</b></span>
                    <input class="form-control" type="text" name="valor" id="valor" value="{{old('cpf')}}"
                        placeholder="">
                </div>
            </div>

        </div>

        <hr>

        <button type="submit" class="btn btn-primary" style="padding-right: 8px;">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg> Cadastrar</button>


        <a href="/servicos" class="btn btn-danger">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg>

            Cancelar</a>
    </form>

</div>

@endsection