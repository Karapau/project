@extends('layouts.painel')


@section('content')
<p>Pedidos</p>

<div class="container">
      <h2 class="text-center">Pedido</h2>
      <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: {{ $pedido->orders->id }}</li>
            <li class="list-group-item">Método de Pagamento: {{ $pedido->orders->payment_mothod }}</li>
            <li class="list-group-item">Comprador: {{ $pedido->orders->user_name }}</li>
            <li class="list-group-item">Email do Comprador: {{ $pedido->orders->email }}</li>
            <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->orders->telemovel }}</li>
            {{-- <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->products->status }}</li> --}}
            <li class="list-group-item">Status: @if($pedido->products->status == 0) Aguardando
                  @elseif($pedido->products->status == 1) Em Preparação @elseif($pedido->products->status == 2) Saiu
                  Para Entrega @elseif($pedido->products->status == 3) Entregue @endif</li>

      </ul>
      <h2 class="text-center mt-5">Endereço</h2>
      <ul class="list-group list-group-flush">
            <li class="list-group-item">Morada: {{ $pedido->adresses->morada }}</li>
            <li class="list-group-item">Código Postal: {{ $pedido->adresses->codigo_postal }}</li>
            <li class="list-group-item">Região: {{ $pedido->adresses->regiao }}</li>
            <li class="list-group-item">Distrito: {{ $pedido->adresses->distrito }}</li>
            <li class="list-group-item">Conselho: {{ $pedido->adresses->distrito }}</li>
            <li class="list-group-item">Freguesia: {{ $pedido->adresses->freguesia }}</li>
      </ul>
      <h2 class="text-center mt-5">Produtos</h2>

      <ul class="list-group list-group-flush mt-4 mb-4">
            <li class="list-group-item">Produto: {{ $pedido->products->name }}</li>
            <li class="list-group-item">Preço: {{  '€ '.number_format($pedido->products->price, 2, ',', '.') }}</li>
            <li class="list-group-item">Quantidade: {{ $pedido->products->quantity }}Kg</li>

      </ul>


</div>



@endsection