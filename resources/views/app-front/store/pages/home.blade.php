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
        <div class="col-6 scale-in-center">
            <a href="{{ route('store.porto') }}"> <img class="scale-in-center" src="{{ url('front-app/store/assets/img/icons/compras.svg') }}"
                    alt=""></a>
            <p>Fazer Compras</p>
        </div>
        <div class="col-6 scale-in-center">
            <a href="{{ route('user.pedidos') }}"> <img class="scale-in-center" src="{{ url('front-app/store/assets/img/icons/encomendas.svg') }}"
                    alt=""></a>
            <p>SUAS ENCOMENDAS</p>
        </div>
        <div class="col-6 scale-in-center">
            <a href="{{ route('store.user.edit-ind', auth()->user()->id) }}"><img class="scale-in-center" src="{{ url('front-app/store/assets/img/icons/perfil.svg') }}" alt=""></a>
            <p>SEUS DADOS
                DE PERFIL</p>
        </div>
        <div class="col-6 scale-in-center">
            <a href="https://api.whatsapp.com/send?phone=+351915934182" target="_blank"><img class="scale-in-center" src="{{ url('front-app/store/assets/img/icons/suporte.svg') }}" alt=""></a>
            <p>SUPORTE TÉCNICO</p>
        </div>
    </div>
</div>
@endsection
