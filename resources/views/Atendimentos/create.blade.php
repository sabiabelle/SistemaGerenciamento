@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/2.png"> Registrando atendimentos</h2>
    <br>
    <hr>
    <form class="" action="/atendimentos/store" method="post" enctype="multipart/form-data">

        @csrf
        <div class="card border-dark mb-3" style="max-width: 70rem;">
            <div class="card-body text-dark">
                <h5 class="card-title" style="color: #C71585">Dados do cliente</h5>
                <p class="card-text">
                    <img src="/icons/user.png"> <b>Nome: </b> {{$clientes->nome}} &nbsp
                    <img src="/icons/tel.png"> <b>Contato: </b> {{$clientes->celular}} &nbsp
                    <img src="/icons/insta.png"> <b>Instagram: </b> @ {{$clientes->instagram}}
                </p>
            </div>
        </div>

        <br>
        <input class="form-control" type="hidden" name="cliente_id" id="cliente_id" value="{{$clientes->id}}">
        <input class="form-control" type="hidden" name="data_atendimento" id="data_atendimento" value="{{$data}}">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="user_id"><img src="/icons/user.png"> Atendido por:<b style="color: red;">*</b></label>
                <select class="form-control" name="user_id" id="user_id" require>
                    <option value="" selected> Selecione um funcionário</option>
                    @foreach($users as $us)
                    <option value="{{$us->id}}">{{$us->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="servicos_id"><img src="/icons/eye.png"> Serviços:<b style="color: red;">*</b></label>
                <select class="form-control" name="servicos_id" id="servicos_id" require>
                    <option value="" selected> Selecione um serviço</option>
                    @foreach($servicos as $s)
                    <option value="{{$s->id}}">{{$s->descricao}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="classes_id"><img src="/icons/pay.png"> Forma de pagamento:<b
                        style="color: red;">*</b></label>
                <select class="form-control" name="forma_pagamento" id="forma_pagamento" require>
                    <option value="" selected> Selecione pagamento</option>
                    <option value="Cartão">Cartão</option>
                    <option value="Dinheiro">Dinheiro</option>
                </select>
            </div>
        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/real.png"> Valor pago:</label>
                <div class="input-group-prepend">
                    <div class="input-group-text">R$</div>
                    <input class="form-control" type="text" require name="valor_pago" id="valor"
                        onkeyup="formatarMoeda();" value="{{old('valor_pag')}}">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/card.png"> Data e hora:</label>
                <input class="form-control" readonly type="text" name="timestamp" id="timestemp"
                    value="{{\Carbon\Carbon::parse($data)->format('d/m/Y')}} às {{$hora}}">
            </div>

            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/res.png"> Atendimento registrado por:</label>
                <input class="form-control" readonly type="text" name="registrado_por" id="registrado_por"
                    value="{{$usuario_logado->name}}">
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary" style="padding-right: 8px;">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg> Registrar</button>


        <a href="/clientes" class="btn btn-danger">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg> Cancelar</a>
    </form>
</div>

@endsection

<script>
function formatarMoeda() {
    var elemento = document.getElementById('valor');
    var valor = elemento.value;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ".$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, "$1.$2");
    }

    elemento.value = valor;
}
</script>