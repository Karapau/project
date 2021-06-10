@extends('layouts.app-store')


@section('content')

<div class="header">
      <div class="container">
            <div class="text-center mx-auto py-5">
                  <a href="{{ route('store.index') }}"> <img src="{{ url('app-store/img/logo.svg') }}" alt=""></a>
            </div>
      </div>
</div>
<div class=" pb-5">
      <div class="d-flex top mt-3 justify-content-around">
            <div>
                  <h3>{{ $produto->especies->nome_portugues }}</h3>
            </div>
            <div>
                  <a href="javascript:history.back()"> <button class="btn btn-info">VOLTAR</button></a>
            </div>
      </div>
      <div class="produtos-single">
            <div class="text-center mt-4">
                  <button class="btn btn-red">INFORMAÇÕES
                        GERAIS</button>
            </div>
            <div>
                  <h2>{{ $produto->especies->nome_portugues }}</h2>
            </div>
            <div class="row-1 mt-5">
                  <p>Arte da Pesca</p>
            </div>
            <div class="row-2">
                  <p>
                        @if ($produto->arte == 'redes_de_emalhar')
                        Redes de emalhar
                        @elseif($produto->arte == 'rede')
                        Rede
                        @elseif($produto->arte == 'vara')
                        Vara
                        @elseif($produto->arte == 'cerco')
                        Cerco
                        @elseif($produto->arte == 'arrasto')
                        Arrasto
                        @elseif($produto->arte == 'anzol')
                        Anzol
                        @elseif($produto->arte == 'armadilhas')
                        Armadilhas
                        @elseif($produto->arte == 'apanha')
                        Apanha
                        @elseif($produto->arte == 'redes_de_tresmalho')
                        Redes de Tresmalho
                        @elseif($produto->arte == 'envolventes_arrastantes')
                        Envolventes arrastantes
                        @elseif($produto->arte == 'arte_xavega')
                        Arte Xávega
                        @endif
                  </p>
            </div>
            @if ($produto->unidade == 'Unidade')
            <div class="row-1 mt-5">
                  <p>Unidades do Produto</p>
            </div>
            <div class="row-2">
                  <p>{{ $produto->quantidade_unidade }}</p>
            </div>
            @endif
            <div class="row-1">
                  <p>Tamanho</p>
            </div>
            <div class="row-2">
                  <p>
                        @if($produto->tamanho == 'tamanho1')
                        Tamanho 1 (T1)
                        @elseif($produto->tamanho == 'tamanho2')
                        Tamanho 2 (T2)
                        @elseif($produto->tamanho == 'tamanho3')
                        Tamanho 3 (T3)
                        @elseif($produto->tamanho == 'tamanho4')
                        Tamanho 4 (T4)
                        @endif

                  </p>
            </div>
            <div class="row-1">
                  <p>Zona de Pesca</p>
            </div>
            <div class="row-2">
                  <p>{{ $produto->zona }}</p>
            </div>
            <div class="row-1">
                  <p>Embarcação</p>
            </div>
            <div class="row-2">
                  <p>{{ $produto->embarcacao }}</p>
            </div>
      </div>
</div>



@endsection