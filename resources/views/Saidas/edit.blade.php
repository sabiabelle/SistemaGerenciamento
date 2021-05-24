@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/2.png"> Alterando saídas de caixa</h2>
    <br>
    <hr>
    <form class="" action="/saidas/{{$saidas->id}}/update" method="post" enctype="multipart/form-data">

        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/real.png"> Valor retirado:</label>
                <div class="input-group-prepend">
                    <div class="input-group-text">R$</div>
                    <input class="form-control" type="text" require name="valor" id="valor" onkeyup="formatarMoeda();"
                        value="{{$saidas->valor}}">
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/card.png"> Data e hora:</label>
                <input class="form-control" readonly type="text" name="" id="" value="{{\Carbon\Carbon::parse($data)->format('d/m/Y')}} às {{$hora}}">
                <input class="form-control"  type="hidden" name="data_registro" id="data_registro" value="{{$data}}">
            </div>

            <div class="form-group col-md-4">
                <label for="instagram"><img src="/icons/res.png"> Registrado por:</label>
                <input class="form-control" readonly type="text" name="registrado_por" id="registrado_por" value="{{$usuario_logado->name}}">
            </div>
        </div>

        <hr>

        <button type="submit" class="btn btn-primary" style="padding-right: 8px;">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
            </svg> Registrar</button>


        <a href="/saidas" class="btn btn-danger">
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
  valor = parseInt(valor.replace(/[\D]+/g,''));
  valor = valor + '';
  valor = valor.replace(/([0-9]{2})$/g, ".$1");

  if (valor.length > 6) {
    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, "$1.$2");
  }

  elemento.value = valor;
}
</script>