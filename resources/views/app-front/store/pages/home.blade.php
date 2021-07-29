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
        <a href="{{ route('user.logout') }}">SAIR</a>
    </div>

    <div class="row mt-5 menu-icons">
        <div class="col-6">
            <a href="{{ route('store.porto') }}"> <img src="{{ url('front-app/store/assets/img/icons/compras.svg') }}"
                    alt=""></a>
            <p>Fazer Compras</p>
        </div>
        <div class="col-6">
            <a href="{{ route('user.pedidos') }}"> <img src="{{ url('front-app/store/assets/img/icons/encomendas.svg') }}"
                    alt=""></a>
            <p>SUAS ENCOMENDAS</p>
        </div>
        <div class="col-6">
            <img src="{{ url('front-app/store/assets/img/icons/perfil.svg') }}" alt="">
            <p>SEUS DADOS
                DE PERFIL</p>
        </div>
        <div class="col-6">
            <img src="{{ url('front-app/store/assets/img/icons/suporte.svg') }}" alt="">
            <p>SUPORTE TÉCNICO</p>
        </div>
    </div>
</div>
@endsection
