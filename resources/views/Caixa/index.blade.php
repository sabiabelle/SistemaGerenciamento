@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/1.png"> Fluxo de caixa</h2>

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
    <hr>
    <div class="card" style="width: 50rem;">
        <div class="card-body">
            <h3 class="card-title" style="color:red"> <svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                    class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path fill-rule="evenodd"
                        d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                    <path
                        d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z" />
                </svg> Resumo de registros do dia</h3>
            <p class="card-text" style="font-size: 1.5em;">
                <b>Quant. de atendimentos realizados no dia: </b> {{$quantidade}}
                <b>Valor inicial de caixa:</b> {{  'R$ '.number_format($valor_inicial, 2, ',', '.') }} <br>
                <b>Entradas do dia:</b> {{  'R$ '.number_format($soma_entradas, 2, ',', '.') }}
                <b>Saídas do dia:</b> {{  'R$ '.number_format($soma_saidas, 2, ',', '.') }}<br>
                <b>Saldo em caixa:</b> {{  'R$ '.number_format($saldo_total, 2, ',', '.') }}

                @if($saldo > 0) <b>Ganhos do dia:</b> <b
                    style="color: red">{{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                @elseif($saldo = $soma_entradas)
                <b>Saldo do dia:</b> <b style="color: green">{{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                @else
                <b>Saldo do dia:</b> <b style="color: blue">
                    {{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                @endif
            </p>

            <form class="" action="/caixa/store" method="post" enctype="multipart/form-data">
                @csrf

                @if($status_caixa == 0)
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calculator" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12 1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-2zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-4z" />
                    </svg> Encerrar Caixa </button>
                @else
                <h3> <b style="color: blue">Caixa encerrado!</b></h3>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="media">
                                    <img src="/icons/alerta.png" class="mr-3" alt="Atenção">
                                    <div class="media-body">
                                        Após o fechamento de caixa não será possivel realizar
                                        adicionar novo registros ou realizar alterações, deseja realmente continuar com
                                        esta
                                        ação?


                                        <input class="form-control" type="text" name="entradas_total"
                                            id="entradas_total" value="{{$soma_entradas}}">

                                        <input class="form-control" type="text" name="saidas_total" id="saidas_total"
                                            value="{{$soma_saidas}}">

                                        <input class="form-control" type="text" name="valor_inicial" id="valor_inicial"
                                            value="{{$valor_inicial}}">

                                        <input class="form-control" type="hidden" name="caixa_total" id="caixa_total"
                                            value="{{$saldo_total}}">

                                        <input class="form-control" type="text" name="registrado_por"
                                            id="registrado_por" value="{{$usuario_logado->name}}">

                                        <input class="form-control" type="text" name="data_registro" id="data_registro"
                                            value="{{$data}}">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Não</button>
                                <button type="submit" class="btn btn-danger">Sim, fechar caixa.</button>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

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

    {{$caixa_pag->links()}}
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