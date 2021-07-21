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
      <div class="d-flex inicio mt-3 ">
            <div>
                <a href="{{ route('store.index') }}">  <button class="btn btn-voltar">VOLTAR</button></a>
            </div>
            <div>
                  <span>ENCOMENDA {{ $order->id }}</span>
            </div>
      </div>
</div>
<div class="container mt-5">
      <div class="detail">
            <span>Detalhes da Encomenda</span>
      </div>
</div>

<div class="mt-5">
      <div class="d-flex itens">
            <div>
                  <span>ESPÉCIME</span>
            </div>
            <div>
                  <span>QUANT</span>
            </div>
            <div>
                  <span>VALOR</span>
            </div>
            <div>
                  <span>STATUS</span>
            </div>
      </div>
</div>

<div class="square">
      <div class="container">
            <div class=" d-flex itens mt-3 pt-3">
                  <div>
                        <span>{{ $order->products->name }}</span>
                  </div>
                  <div>
                        <span>{{ $order->products->quantity }} KG</span>
                  </div>
                  <div>
                        <span>{{  '€ '.number_format($order->products->price, 2, ',', '.') }}</span>
                  </div>
                  <div>
                        <button
                              class=" botao-prep @if($order->products->status == 0) botao-prep @elseif($order->products->status == 1) botao-trans @elseif($order->products->status == 2) botao-entr @endif">
                              @if($order->products->status
                              == 0) AGUARDANDO PAGAMENTO
                            @elseif($order->products->status == 1) ANÁLISE FINANCEIRA
                            @elseif($order->products->status == 2) PAGAMENTO ACEITO
                            @elseif($order->products->status == 3) A LIBERAR
                            @elseif($order->products->status == 4) EM TRANSPORTE
                            @elseif($order->products->status == 5) ENTREGUE
                            @elseif($order->products->status == 6) CANCELADO @endif</button>
                  </div>
            </div>
            <div class="mt-3 text-center " id="linha-horizontal"></div>
            <div class="d-flex mt-3 avaliar">
                @if ($order->products->status != 5)
                <form action="{{ route('user.produto.status', $order->products->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="status" value="5">
                    <button type="submit" class="btn btn-primary">INFORMAR RECEBIMENTO</button>
                </form>
                @else
                <button type="button" class="btn botao-entr">PRODUTO ENTREGUE</button>
                @endif


                  <button type="button" class="btn btn-primary">AVALIAR</button>
            </div>
      </div>
</div>

<div class="square">
      <div class="container">
            <div class=" itens mt-3 pt-3 text-start">
                  <span>Conta para Transferência</span>
                  <div>
                        <span>banco Montepio - numero de conta : 295.10.005582-7 <br> BIC/SWIFT : MPIOPTPL <br> NIB : 0036.0295.99100055827.07 <br> IBAN: PT50.0036.0295.99100055827.07</span>
                  </div>
            </div>
      </div>
</div>
<div class="square">
    <div class="container">
        @if ($order->products->status == 0)
        <div  class="itens">
            <form action="{{ route('pay.image.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <div class="form-group">
                  <input type="file" name="comprovante" class="form-control-file" required>
                </div>
                <div>
                    <button class="btn btn-success">Enviar Comprovante</button>
                </div>
              </form>
          </div>
        @endif

    </div>
</div>
<div class="square">
      <div class="container">
            <div class=" itens mt-3 pt-3 text-start">
                  <span>Local de Entrega</span>
                  <div>
                        <span>Endereço: {{ $order->adresses->morada }},<br> {{ $order->adresses->codigo_postal }}
                              {{ $order->adresses->distrito }}</span>
                  </div>
            </div>
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
            <a href="javascript:history.back()">
                  <p>Voltar</p>
            </a>
      </div>
</div>
<div class="pedidos">
      <div class="container mt-5">
            <div class="text-center text-uppercase">
                  <h3>ID: {{ $order[0]->id }}</h3>
                  <h3>Pagamento: {{ $order[0]->payment_mothod }}</h3>
                  <h3>Status: @if($order[0]->status == 0)
                        Aguardando
                        @elseif($order[0]->status == 1)
                        Em preparação
                        @elseif($order[0]->status == 2)
                        Entrega
                        @endif</h3>
            </div>

            <div class="pedidos-s">
                  <h2 class="text-center text-uppercase">Produtos</h2>
            </div>
            @foreach ($produtos as $produto)
            <div class="text-center text-uppercase my-5 bg-info py-3 text-white">
                  <h3>Nome: {{ $produto->name }}</h3>
                  <h3>Preço: {{  '€ '.number_format($produto->price, 2, ',', '.') }}</h3>
                  <h3>Quantidade: {{ $produto->quantity }} Kg</h3>
            </div>
            @endforeach
            <div class="pedidos-s">
                  <h2 class="text-center text-uppercase">Endereço</h2>
            </div>

            <div class="text-center text-uppercase my-5 bg-info py-3 text-white">
                  <h3>Morada: {{ $order[0]->enderecos->morada }}</h3>
                  <h3>Código Postal: {{ $order[0]->enderecos->codigo_postal }}</h3>
                  <h3>Região: {{ $order[0]->enderecos->regiao }}</h3>
                  <h3>Distrito: {{ $order[0]->enderecos->distrito }}</h3>
                  <h3>Distrito: {{ $order[0]->enderecos->conselho }}</h3>
                  <h3>Distrito: {{ $order[0]->enderecos->freguesia }}</h3>
            </div>


      </div>
</div> --}}

@endsection
