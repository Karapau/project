@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top_1">
        <div class="nome-porto">
            <h1>{{ $produto->especies->nome_portugues }}</h1>
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="{{ route('store.produto', $produto->porto_id) }}">VOLTAR</a>
    </div>
    <div class="container">
        <div class="detalhes mt-6 text-center">
            <div class="mb-5">

                <div class="porto">
                    <a href="#"> <img src="{{ url('storage/especies/' . $produto->especies->image) }}" alt=""></a>
                </div>
                <div class="mt-2">
                    <h1 id="clock"
                        data-countdown="{{ date('Y-m-d H:i:s', strtotime('+1 days', strtotime($produto->created_at))) }}">
                    </h1>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-in-geral" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    INFORMARÇÕES GERAIS
                </button>
                <div class="mt-3 precokg">
                    <span>{{ '€ ' . number_format($produto->preco, 2, ',', '.') }} - KG</span>
                </div>
                <div class="mt-3 stock">
                    <h2>STOCK {{ $produto->quantidade_kg }} KG</h2>
                </div>
                @php
                    $value = 0;
                    foreach (\Cart::getContent() as $item) {
                        $value = $item->quantity;
                    }
                @endphp
                <form action="{{ route('store.cart.add') }}" method="POST">
                    @csrf
                    <div>
                        <span class="input-number-decrement qty-count--minus" data-action="minus">–</span>
                        <input name="quantity" class="input-number" type="number" value="10" min="10"
                            max="{{ $produto->quantidade_kg - $value }}">
                        <span class="input-number-increment qty-count--add" data-action="add">+</span>
                    </div>
                    <div class="d-none">
                        <input type="hidden" name="id" value="{{ $produto->id }}">
                        <input type="hidden" name="name" value="{{ $produto->especies->nome_portugues }}">
                        <input type="hidden" name="price" value="{{ $produto->preco }}">
                        <input type="hidden" name="image" value="{{ $produto->especies->image }}">
                        <input type="hidden" name="user_id" value="{{ $produto->user_id }}">
                        <input type="hidden" name="pescador_id" value="{{ $produto->pescador_id }}">
                        <input type="hidden" name="embarcacao" value="{{ $produto->embarcacao }}">
                        <input type="hidden" name="margem" value="{{ $produto->especies->margem }}">

                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-comprar">COMPRAR</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

    <div class="total">
        <div class="container">
            <div class="itens">
                <div>
                    <span>itens ({{ Cart::getTotalQuantity() }})</span>
                </div>
                <div>
                    <span>{{ '€ ' . number_format(Cart::getSubTotal(), 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
        <div class="finalizar">
            <a href="{{ route('store.checkout.adress') }}"> <button>FINALIZAR COMPRA</button></a>
        </div>
    </div>

    @component('components.modal.filtro-modal', ['title' => 'Informações gerais'])
        <div class="nome">
            <h1>{{ $produto->especies->nome_portugues }}</h1>
        </div>
        <div class="arte-pesca">
            <h4>ARTE DA PESCA</h4>
            <h6>
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
            </h6>
        </div>
        <div class="tamanho">
            <h4>TAMANHO</h4>
            <h6>
                @if ($produto->tamanho == 'tamanho1')
                    Tamanho 1 (T1)
                @elseif($produto->tamanho == 'tamanho2')
                    Tamanho 2 (T2)
                @elseif($produto->tamanho == 'tamanho3')
                    Tamanho 3 (T3)
                @elseif($produto->tamanho == 'tamanho4')
                    Tamanho 4 (T4)
                @endif
            </h6>
        </div>
        <div class="zona">
            <h4>ZONA DE PESCA</h4>
            <h6>{{ $produto->zona }}</h6>
        </div>
        <div class="embarcação">
            <h4>EMBARCAÇÃO</h4>
            <h6>{{ $produto->embarcacao }}</h6>
        </div>
    @endcomponent
@endsection
