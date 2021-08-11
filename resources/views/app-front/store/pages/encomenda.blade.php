@extends('layouts.front-app.store.home')

@section('content')
    <div class="header-top">
    </div>
    <div class="headertop1"></div>



    <div class="container">

        <div class="buyer-number">
            <div class="comprador">
                <p>NÚMERO DE <br> COMPRADOR</p>
            </div>
            <div class="numero">
                <p>1000{{ auth()->user()->id }}</p>
            </div>
        </div>

        <div class="title">
            <p>Olá, {{ auth()->user()->name }}</p>
            <a href="">SAIR</a>
        </div>
    </div>
    <div class="top mt-3">
        <div class="container">
            <div class="center">
                <div class="titulo">
                    <h1>ENCOMENDAS</h1>
                </div>
            </div>
            <div class="text-center">
                <div class="botao-voltar">
                    <a href="{{ route('store.index') }}"> <button class="btn btn-voltar btn-lg">VOLTAR</button></a>
                </div>
            </div>
        </div>
    </div>
    @foreach ($user_orders as $order)
        <div class="top_1 mb-5">
            <div class="container">
                <div class="center">
                    <div class="titulo">
                        <h2>ENCOMENDAS</h2>
                    </div>
                    <div class="numero-pedido">
                        <h3>{{ $order->codigo }}</h3>
                    </div>
                    <div class="aguardando-pagamento text-uppercase">
                        <h1>
                            @if ($order->status == 0)
                                Aguardando pagamento
                            @elseif ($order->status == 1)
                                Análise Financeira
                            @elseif ($order->status == 2)
                                Pago
                            @elseif ($order->status == 3)
                                Cancelado
                            @endif
                        </h1>
                    </div>
                </div>
                <div class="text-center">
                    <div class="botao-ver-detalhes">
                        <a href="{{ route('user.pedido.produto', $order->id) }}"> <button
                                class="btn btn-detalhes btn-lg">VER DETALHES</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
