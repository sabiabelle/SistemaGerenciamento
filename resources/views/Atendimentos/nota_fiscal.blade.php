@extends('layouts.app')
@section('content')

<div class="container">
    <br>
    <h2 align="center"><img src="/menu/3.png"> Atualizando cadastro de clientes</h2>
    <br>
    <hr>
    <form class="" action="/atendimentos/download" method="post" enctype="multipart/form-data">

        @csrf
        <div id="print" class="card border-dark mb-3" style="max-width: 40rem; align-content:center;">
            <div class="card-body text-dark" align="center">
                <img src="/nota.png" id="image">

                <p align="center"><b>VANINHA BORGES</b> <br>Rua 7, número 1288, 396-470, CEP 77760-000, Colinas - TO,
                    Brasil. </p>
                <h4 class="card-title" align="center">Nota fiscal</h4>
                <p class="card-text" align="left">
                    <b>Data:</b>{{$atendimentos->updated_at}} <br>
                    <b>Cliente: </b>{{$atendimentos->clientes->nome}}<br>
                    <b>Procedimento:</b> {{$atendimentos->servicos->descricao}} ---------- {{$atendimentos->valor_pago}}
                    <br><br>
                <p align="center"><b> {{$atendimentos->users->name}} </b><br> Funcionário(a) </p>
                </p>
            </div>
        </div>

        <button type="button" onclick="cont();" name="imprimir" class="btn btn-info">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                <path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                <path fill-rule="evenodd"
                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
            </svg> Imprimir </button>


        <a href="/home" class="btn btn-danger">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z" />
                <path fill-rule="evenodd"
                    d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z" />
            </svg> Cancelar</a>
    </form>

</div>

<script type="text/javascript">
function cont() {
    var conteudo = document.getElementById('print').innerHTML;
    tela_impressao = window.open('about:blank');
    tela_impressao.document.write(conteudo);
    tela_impressao.window.print();
    tela_impressao.window.close();
}
</script>

@endsection