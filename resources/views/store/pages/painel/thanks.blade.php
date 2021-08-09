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
      <div class="texto-ok text-center text-uppercase">
            <h5>Conta para Transferência</h5>
            <div>
                <span>banco Montepio - numero de conta : 295.10.005582-7 <br> BIC/SWIFT : MPIOPTPL <br> NIB :
                    0036.0295.99100055827.07 <br> IBAN: PT50.0036.0295.99100055827.07</span>
            </div>
      </div>
      <div class="text-center mt-3">
           <a href="{{ route('user.pedidos') }}"> <button class="botao-enc">Ver encomendas</button></a>
      </div>
</div>


@endsection
