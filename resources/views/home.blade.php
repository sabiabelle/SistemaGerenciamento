@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body" align="center">

                    <div class="btn-group responsive-lg" role="toolbar" aria-label="Basic example">

                        @can('gerente')
                        <a href="/usuarios" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/5.png">
                            <h5 style="padding-top:0.5em"> Controle de <br> acesso </h5>
                        </a>

                        <a href="/servicos" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"> <img src="/menu/7.png">
                            <h5 style="padding-top:0.5em">Cadastrar <br> Procedimentos</h5>
                        </a>
                        @endcan

                        <a href="/clientes" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/3.png">
                            <h5 style="padding-top:0.5em">Cadastrar <br>Cliente</h5>
                        </a>

                        <a href="/atendimentos" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/1.png">
                            <h5 style="padding-top:0.5em"> Registrar <br> entradas</h5>
                        </a>

                        <a href="/saidas" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/10.png">
                            <h5 style="padding-top:0.5em"> Registrar <br> Saídas</h5>
                        </a>

                        <a href="/atendimentos/entradas" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/2.png">
                            <h5 style="padding-top:0.5em"> Entradas <br> registradas</h5>
                        </a>

                        <a href="/atendimentos/registros" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/4.png">
                            <h5 style="padding-top:0.5em"> Atendimentos <br> Realizados </h5>
                        </a>

                        <a href="/clientes/show" class="btn btn-outline-vaninha btn-lg"
                            style="padding-left: 10px; padding-top: 20px;"><img src="/menu/6.png">
                            <h5 style="padding-top:0.5em"> Aniversários<br> do Mês </h5>
                        </a>

                    </div>
                </div>
            </div>

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
                <br>
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
            <form>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">
                            <b>Quant. de atendimentos realizados no dia: </b> {{$quantidade}} <br>
                            <b>Entradas do dia:</b> {{  'R$ '.number_format($soma_entradas, 2, ',', '.') }} <br>
                            <b>Saídas do dia:</b> {{  'R$ '.number_format($soma_saidas, 2, ',', '.') }}<br>

                            @if($saldo < 0) <b>Saldo do dia:</b> <b
                                    style="color: red">{{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                                @elseif($saldo = $soma_entradas)
                                <b>Saldo do dia:</b> <b
                                    style="color: green">{{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                                @else
                                <b>Saldo do dia:</b> <b style="color: blue">
                                    {{  'R$ '.number_format($saldo, 2, ',', '.') }}</b><br>
                                @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <a href="/caixa/fluxo" class="btn btn-success btn-lg active" role="button"
                                    aria-pressed="true"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                        class="bi bi-cash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M15 4H1v8h14V4zM1 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H1z" />
                                        <path
                                            d="M13 4a2 2 0 0 0 2 2V4h-2zM3 4a2 2 0 0 1-2 2V4h2zm10 8a2 2 0 0 1 2-2v2h-2zM3 12a2 2 0 0 0-2-2v2h2zm7-4a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                                    </svg> Iniciar caixa</a>

                                <a href="/caixa" class="btn btn-danger btn-lg active" role="button"
                                    aria-pressed="true"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                                        class="bi bi-x-square-fill" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                                    </svg> Encerrar caixa</a>

                                <a href="/caixa/historico" class="btn btn-primary btn-lg active" role="button"
                                    aria-pressed="true">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-receipt"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                        <path fill-rule="evenodd"
                                            d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                    </svg> Histórico</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <hr>

            <h3 align="left"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-journal-text"
                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1H2a2 2 0 0 1 2-2z" />
                    <path
                        d="M2 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2z" />
                    <path fill-rule="evenodd"
                        d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg> Últimos atendimentos</h2>

                <br>
                <table class="table table-responsive-lg">
                    <thead class="thead-dark">
                        <th>Data de registro</th>
                        <th>Registrado por:</th>
                        <th>Valor</th>
                    </thead>

                    <tbody>
                        @foreach($fluxos as $fl)
                        <tr class="table-light">
                            <td>{{\Carbon\Carbon::parse($fl->data_registro)->format('d/m/Y')}}</td>
                            <td>
                                <p>
                                    <b>Registrado por:</b> {{$fl->registrado_por}}
                                </p>
                                </>
                                @if($fl->tipo_registro == 1)
                            </td>
                            <td><b style="color: blue">R$ {{$fl->valor}}</b></td>
                            @elseif($fl->tipo_registro == 2)
                            <td><b style="color: green">R$ {{$fl->valor}}</b></td>
                            @else
                            <td><b style="color: red"> - R$ {{$fl->valor}}</b></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>

                </table>
        </div>
        {{$fluxos_pag->links()}}
    </div>
    @endsection