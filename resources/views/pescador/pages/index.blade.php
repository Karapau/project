@extends('layouts.app-pescador')

@section('content')
<div class="">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo.svg') }}" alt="">
            </div>
      </div>
</div>
<div class="main">
      <div class="title">
            <div class="container px-4 d-flex justify-content-between">
                  <div class="pt-3">
                        <h4>Olá, {{ auth()->user()->name  }} {{ auth()->user()->lastname  }}</h4>
                  </div>
                  <div>
                        <a href="{{ route('pescador.logout') }}"> <span class="iconify" data-inline="false"
                                    data-icon="ls:logout"
                                    style="color: #ffffff; font-size: 38.42677688598633px;"></span></a>
                  </div>
            </div>
      </div>
      {{-- @php
            $value = 0;
      @endphp
      @foreach ($wallet as $result)
      @php
                 $value = $result->value;
      @endphp

@endforeach --}}

        @php
            $value = 0;
        @endphp
        @foreach ($pedidos as $pedido)
            @if ($pedido->products->status != 0 AND $pedido->products->status != 1)
            @if ($pedido->values)
            @php
                $value += $pedido->values->value
            @endphp
            @endif
            @endif

        @endforeach
      <div class="container mt-2">
            <div class="wallet d-flex px-4">
                  <div class="py-4 ">
                        <a href=""><i class="fas fa-wallet a-2"></i> Seu Wallet</a>
                        <h3 class="balance">
                            {{  '€ '.number_format($value, 2, ',', '.') }}
                        </h3>
                  </div>
                  <div class="col-4 eye">
                        <span onclick="hide()"><i class="fas fa-eye"></i></span>
                  </div>
                  <div class="col-4 eye-close d-none">
                        <span onclick="show()"><i class="fas fa-eye-slash"></i></span>
                  </div>
            </div>
      </div>
      <div class="container mt-3">
            <div class="ativos text-uppercase px-4">
                  <div class="py-4 text-center">
                        <h3 href="">Peixes à venda na plataforma</h3>
                  </div>
                  <div class="d-flex">
                        <div>
                              <span>00{{ $produtos->count() }}</span>
                        </div>
                        <div>
                              <a href="{{ route('pescador.produto.list') }}">Ver Todos</a>
                        </div>

                  </div>
            </div>
      </div>
      <div class="container mt-3">
            <div class="inativos px-4">
                  <div class="py-4 text-center">
                        <h3 href="">Pedidos recebidos</h3>
                  </div>
                  <div class="d-flex">
                        <div>
                              <span>00{{ $pedidos->count() }}</span>
                        </div>
                        <div>
                              <a href="{{ route('pescador.pedidos') }}">Ver Pedidos</a>
                        </div>

                  </div>
            </div>
      </div>
      <div class="container mt-3">
            <div class="peixes text-uppercase px-4">
                  <div class="py-4 text-center">
                        <h3 href="">Vender o seu peixe</h3>
                  </div>
                  <div class="button text-center">
                        <a href="{{ route('pescador.produto') }}">INICIAR VENDA</a>
                  </div>
            </div>
      </div>
</div>

@endsection
