@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/6.png"> Aniversariantes do mês </h2>
    <br>

    <div class="row">
        @foreach($clientes as $c)
        <div class="col-sm-4" style="padding-bottom: 15px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{\Carbon\Carbon::parse($c->data_nasc)->format('d/m/Y')}}</h5>
                    <h3 class="card-subtitle mb-2 " style="color:#C71585">{{$c->nome}}</h3>
                    <p class="card-text"><img src="/icons/insta.png"> {{$c->instagram}}</p>

                </div>
            </div>
        </div>
        <br><br>
        @endforeach
    </div>

    <hr>
    <a href="/home" class="btn btn-dark" style="padding-right: 20px;">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z" />
            <path fill-rule="evenodd"
                d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z" />
        </svg>
        <b> Voltar </b>
    </a>

</div>

@endsection