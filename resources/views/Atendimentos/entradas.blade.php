@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/2.png"> Entradas registradas</h2>
    <br>
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
    <br>
    <br>
    <table class="table table-responsive-lg">
        <thead class="thead-dark">
            <th>Data do atendimento</th>
            <th>Cliente</th>
            <th>Procedimento realizado</th>
            <th>Valor</th>
            <th>Nota fiscal</th>
        </thead>

        <tbody>
            @foreach($atendimentos as $at)
            <tr class="table-light">
                <td>{{\Carbon\Carbon::parse($at->updated_at)->format('d/m/Y')}}</td>
                <td>{{$at->clientes->nome}}</td>
                <td>
                    <p><b>{{$at->servicos->descricao}}</b><br>
                        <b>Atendida por:</b> {{$at->users->name}}
                    </p>
                </td>
                <td>R$ {{$at->valor_pago}}</td>
                <td>
                    <a href="/atendimentos/{{$at->id}}/nota_fiscal" class="btn btn-info">
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-receipt-cutoff"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v13h-1V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51L2 2.118V15H1V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zM0 15.5a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z" />
                            <path fill-rule="evenodd"
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                        </svg> Nota fiscal
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
{{$atendimentos_pag->links()}}
</div>

</div>
@endsection

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