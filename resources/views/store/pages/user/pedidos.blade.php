@extends('layouts.app-store')


@section('content')
<div class="header">
      <div class="container">
            <div class="text-center mx-auto py-5">
                  <a href="{{ route('store.index') }}"> <img src="{{ url('app-store/img/logo.svg') }}" alt=""></a>
            </div>
      </div>
</div>
<div class="container">
      <div class="d-flex top mt-3 justify-content-around">
            <div>
                  <a href="{{ route('store.index') }}"><button class="btn btn-voltar">VOLTAR</button></a>
            </div>
            <div>
                  <button class="btn btn-filtrar">FILTRAR</button>
            </div>
      </div>
</div>
<div class="status">
      <div class="container">
            @foreach ($user_orders as $order)
            <a href="{{ route('user.pedido.produto', $order->id) }}">
                  <div class="d-flex mt-5 status-in">
                        <div class="item text-uppercase row">
                              {{-- <a href="#">{{ $order->products->name }} - {{ $order->products->quantity }} KG -
                              {{  '€ '.number_format($order->products->price, 2, ',', '.') }}
            </a> --}}
            <div class="col-3">
                  <p>{{ $order->products->name }}</p>
            </div>
            <div class="col-2">
                  <p>{{ $order->products->quantity }} KG</p>
            </div>
            <div class="col-2">
                  <p>{{  '€ '.number_format($order->products->price, 2, ',', '.') }}</p>
            </div>

            <div class="col-5">
                  <button
                        class="btn btn-status0 @if($order->products->status == 0) btn-status0 @elseif($order->products->status == 1) btn-status1 @elseif($order->products->status == 2) btn-status2 @endif">@if($order->products->status
                        == 0) AGUARDANDO PAGAMENTO
                      @elseif($order->products->status == 1) ANÁLISE FINANCEIRA
                      @elseif($order->products->status == 2) PAGAMENTO ACEITO
                      @elseif($order->products->status == 3) A LIBERAR
                      @elseif($order->products->status == 4) EM TRANSPORTE
                      @elseif($order->products->status == 5) ENTREGUE
                      @elseif($order->products->status == 6) CANCELADO @endif</button>
            </div>
      </div>
</div>
</a>
@endforeach
</div>
</div>
{{-- <div class="header-top">
      <div class="container">
            <div class="d-flex icons">
                  <div class="mx-3">
                        <img src="{{ url('app-store/img/icons/icone-notificacoes.svg') }}" alt="">
</div>
<div class="mx-3">
      <img src="{{ url('app-store/img/icons/edit-off.svg') }}" alt="">
</div>

</div>

</div>
</div>

<div class="container">
      <div class="title">
            <a href="{{ route('store.index') }}">
                  <p>Voltar</p>
            </a>
      </div>
</div>
<div class="header-pedidos">
      <div class="container mt-4">
            <div class="d-flex justify-content-between">
                  <div>
                        <h3>ID</h3>
                  </div>
                  <div>
                        <h3>Pagamento</h3>
                  </div>
                  <div>
                        <h3>Status</h3>
                  </div>
            </div>
      </div>
</div>
@forelse ($user_orders as $order)
<a href="{{ route('user.pedido.produto', $order->id) }}">
      <div class="pedidos-body">
            <div class="container mt-4">
                  <div class="d-flex justify-content-between">
                        <div>
                              <h3>{{ $order->id }}</h3>
                        </div>
                        <div>
                              <h3>{{ $order->payment_mothod }}</h3>
                        </div>
                        <div>
                              <h3>
                                    @if($order->status == 0)
                                    Aguardando
                                    @elseif($order->status == 1)
                                    Em preparação
                                    @elseif($order->status == 2)
                                    Entrega
                                    @endif
                              </h3>
                        </div>
                  </div>
            </div>
      </div>
</a>
@empty
<h3>Você não tem pedidos!</h3>
@endforelse --}}

@endsection
