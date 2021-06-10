@extends('layouts.app-store')


@section('content')

    <div class="header">
        <div class="container">
            <div class="text-center mx-auto py-5">
                <a href="{{ route('store.index') }}"> <img src="{{ url('app-store/img/logo.svg') }}" alt=""></a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <div class="checkad">
            <img src="{{ url('user/img/check.png') }}" alt="">
        </div>
        <div class="texto-ok text-center">
            <h1>PEDIDO REALIZADO</h1>
        </div>
        <div class="text-center mt-3">
            <button class="botao-enc">Ver encomendas</button>
        </div>
    </div>


@endsection