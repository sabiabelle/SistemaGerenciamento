@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/2.png"> Registro de atendimentos</h2>
    <h5 align="center"> Clientes cadastrados no sistema</h5>
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

    <form name="buscar" method="GET" action="/atendimentos/">
        <div class="form-row">
            <div class="col">
                <input type="text" name="busca" class="form-control" placeholder="Buscar clientes...">
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary" value="Buscar">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z" />
                        <path fill-rule="evenodd"
                            d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z" />
                    </svg>
                    Buscar
                </button>

                <a href="/home" class="btn btn-dark" style="padding-right: 20px;">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-arrow-bar-left"
                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.854 4.646a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L3.207 8l2.647-2.646a.5.5 0 0 0 0-.708z" />
                        <path fill-rule="evenodd"
                            d="M10 8a.5.5 0 0 0-.5-.5H3a.5.5 0 0 0 0 1h6.5A.5.5 0 0 0 10 8zm2.5 6a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 1 0v11a.5.5 0 0 1-.5.5z" />
                    </svg>
                    <b> Voltar </b>
                </a>
            </div>
        </div>
    </form>
    <br>

    <table class="table table-responsive-lg">
        <thead class="table table-dark">

            <th>CPF</th>
            <th>Nome</th>
            <th>Celular</th>
            <th>Data de Nasc.</th>
            <th>Ação</th>
        </thead>
        <tbody>
            @foreach($clientes as $c)

            <tr class="table-light">
                <td>{{$c->cpf}}</td>
                <td>{{$c->nome}}</td>
                <td>{{$c->celular}}</td>
                <td>{{\Carbon\Carbon::parse($c->data_nasc)->format('d/m/Y')}}</td>

                <td>
                    <a href="/atendimentos/{{$c->id}}/create" class="btn btn-vaninha">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-pencil-square"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg> Registrar atendimento
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
    {{$clientes_pag->links()}}
    @endsection
</div>

@section('bottomscripts')
<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 1200);
</script>

</div>
@endsection