@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top_1">
        <div class="nome-porto">
            <h1>{{ $porto->nome }}</h1>
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="/store-porto">TROCAR</a>
    </div>
    <div class="container">
        <div class="filtrar_1 mt-4">
            <div>
                <button class="btn btn-filtro">FILTRAR</button>
            </div>
        </div>
        <div class="portos mt-4 text-center">
            <div class="row my-3">
                @foreach ($produtos as $produto)
                    @if ($produto->quantidade_kg >= 10)
                        <div class="col-6 mb-5">
                            <div class="porto">
                                <a href="#"> <img src="{{ url('storage/especies/' . $produto->especies->image) }}" alt=""></a>
                            </div>
                            <div>
                                <p>{{ $produto->especies->nome_portugues }}</p>
                            </div>
                            <div class="mt-2">
                                <p id="clock"
                                data-countdown="{{ date('Y-m-d H:i:s', strtotime('+1 days', strtotime($produto->created_at))) }}"></p>
                            </div>
                            <div class="valor-monetario mt-2">
                                <span>{{ '€ ' . number_format($produto->preco, 2, ',', '.') }} - KG</span>
                            </div>
                            <div class="valor-kg mt-2">
                                <span>STOCK - {{ $produto->quantidade_kg }} KG</span>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <div class="total">
        <div class="container">
            <div class="itens">
                <div>
                    <span>itens (10)</span>
                </div>
                <div>
                    <span>€200,00</span>
                </div>
            </div>
        </div>
        <div class="finalizar">
            <button>FINALIZAR COMPRA</button>
        </div>
    </div>

@endsection
