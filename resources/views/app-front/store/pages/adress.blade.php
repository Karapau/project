@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top_1">
        <div class="nome-porto">
            <h1>ENDEREÇO</h1>
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="javascript:history.back()">VOLTAR</a>
    </div>

    @if ($adresses)
        <div class="container">
            <div class="mt-5 mb-5 text-center">
                <div>
                    <h2 class="titulo">MORADA ATUAL</h2>
                </div>
                <div class="endereco">
                    <p>{{ $adresses->morada }}, {{ $adresses->codigo_postal }}, {{ $adresses->distrito }}</p>
                    <div class="mt-3">
                        <a href="{{ route('store.adress') }}">   <button class="btn btn-editar-morada">EDITAR MORADA</button></a>
                    </div>
                </div>
            </div>
        </div>
    @else

        <div class="container">
            <div class="mt-5 mb-5 text-center">
                <div>
                    <h2 class="titulo">MORADA ATUAL</h2>
                </div>
                <div class="endereco">
                    <p>Você ainda não tem uma morada cadastrada</p>
                    <div class="mt-3">
                        <a href="{{ route('store.adress') }}">  <button class="btn btn-cadastrar-morada">CADASTRAR MORADA</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
        @if ($adresses)
        <div class="finalizar">
            <a href="{{ route('store.checkout') }}"> <button>FINALIZAR COMPRA</button></a>
        </div>
        @endif
    </div>
@endsection
