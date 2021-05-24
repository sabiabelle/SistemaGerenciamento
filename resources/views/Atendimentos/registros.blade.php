@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/4.png"> Atendimentos realizados por funcionários </h2>
    <br>


    <div class="row">
        @foreach($users as $us)
        <div class="col-sm-4" style="padding-bottom: 15px;">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$us->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$us->email}}</h6>
                    <p class="card-text">{{$us->user_type}}</p>

                    <a href="/atendimentos/{{$us->id}}/show" class="btn btn-vaninha">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-ruled-fill"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12 1H4a2 2 0 0 0-2 2v2h12V3a2 2 0 0 0-2-2zm2 5H6v2h8V6zm0 3H6v2h8V9zm0 3H6v3h6a2 2 0 0 0 2-2v-1zm-9 3v-3H2v1a2 2 0 0 0 2 2h1zm-3-4h3V9H2v2zm0-3h3V6H2v2z" />
                        </svg> Atendimentos realizados
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        <hr>
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