@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/1.png"> Histórico de fechamentos</h2>

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


    <form name="buscar" method="GET" action="/caixa/historico">
        <div class="form-row">
            <div class="col">
                <input type="date" name="busca" class="form-control">
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

    <hr>

    <div class="row">
        @foreach($caixa as $c)
        <div class="col-sm-4" style="padding-bottom: 15px;">
            <div class="card">
                <div class="card-body" style="font-size: 1.3em;">

                    <h5><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-calendar-week"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                        </svg> {{\Carbon\Carbon::parse($c->data_registro)->format('d/m/Y')}} &nbsp; &nbsp;&nbsp;
                        Saldo: <b style="color:green;"> {{  'R$ '.number_format($c->caixa_total, 2, ',', '.') }} </b>
                    </h5>
                    <hr>
                    <b>Valor inicial de caixa:</b> {{  'R$ '.number_format($c->valor_inicial, 2, ',', '.') }} <br>
                    <b>Entradas do dia:</b> {{  'R$ '.number_format($c->entradas_total, 2, ',', '.') }}<br>
                    <b>Saídas do dia:</b> {{  'R$ '.number_format($c->saida_total, 2, ',', '.') }}<br>
                    <b>Caixa fechado por:</b> {{$c->fechado_por}}
                </div>
            </div>
        </div>
        <br><br>
        @endforeach

    </div>


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