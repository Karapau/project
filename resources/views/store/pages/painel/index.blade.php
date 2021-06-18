@extends('layouts.app-store')


@section('content')
<div class="header-top">
      <div class="container">
            <div class="d-flex icons">
                  <div class="mx-3">
                        <img src="{{ url('app-store/img/icons/icone-notificacoes.svg') }}" alt="">
                  </div>
                  <div class="mx-3">
                      
                        <a href="{{ route('store.user.edit-ind', auth()->user()->id) }}"> <img
                                    src="{{ url('app-store/img/icons/edit-off.svg') }}" alt=""></a>
                  
                  </div>

            </div>

      </div>
</div>

<div class="container">
      <div class="title">
            <p>Olá, {{ auth()->user()->name }}</p>
      </div>

      <div class="row mt-5 menu-icons">
            <div class="col-6">
                  <a href="{{ route('store.porto') }}"> <img src="{{ url('app-store/img/icons/compras.svg') }}"
                              alt=""></a>
                  <p>Fazer Compras</p>
            </div>
            <div class="col-6">
                 <a href="{{ route('user.pedidos') }}"> <img src="{{ url('app-store/img/icons/encomendas.svg') }}" alt=""></a>
                  <p>SUAS ENCOMENDAS</p>
            </div>
            <div class="col-6">
                  <img src="{{ url('app-store/img/icons/perfil.svg') }}" alt="">
                  <p>SEUS DADOS
                        DE PERFIL</p>
            </div>
            <div class="col-6">
                  <img src="{{ url('app-store/img/icons/suporte.svg') }}" alt="">
                  <p>SUPORTE TÉCNICO</p>
            </div>
      </div>
</div>

@endsection