@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/4.png"> Atendimentos realizados por funcionários </h2>
    <br>

    <table class="table table-responsive-lg">
        <thead class="thead-dark">
            <th>Data do atendimento</th>
            <th>Cliente</th>
            <th>Procedimento realizado</th>
            <th>Valor</th>
        </thead>

        <tbody>
            @foreach($atendimentos as $at)
            @if($at->users->id == $func)
            <tr class="table-light">
                <td>{{\Carbon\Carbon::parse($at->updated_at)->format('d/m/Y')}}</td>
                <td>{{$at->clientes->nome}}</td>
                <td>
                    <p><b>{{$at->servicos->descricao}}</b><br>
                        <b>Atendida por:</b> {{$at->users->name}}
                    </p>
                </td>
                <td>R$ {{$at->valor_pago}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    {{$atendimentos_pag->links()}}
</div>

@endsection