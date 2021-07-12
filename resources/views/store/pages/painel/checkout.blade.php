@extends('layouts.app-store')


@section('content')
<form action="{{ route('store.checkout.payment') }}" method="post">
      @csrf
      @if ($errors->any())
      <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif


      <div class="header">
            <div class="container">
                  <div class="text-center d-flex justify-content-end mx-auto py-5">
                        <a href="{{ route('store.checkout.adress') }}"> <button type="button" class="btn btn-voltar">VOLTAR</button></a>
                  </div>
            </div>
      </div>
      <div class="container">
            <div class="morada mt-4">
                  <p>Sitios Salvos</p>
            </div>



            @forelse ($adresses as $adress)
            @if($loop->first)

            <div class="end">
                  <div class="end-in row align-items-center justify-content-center">
                        <div class="col-2">
                              <img src="{{ url('app-store/img/icons/location.svg') }}" alt="">
                        </div>
                        <div class="col-8">
                              <h4>{{ $adress->morada }} - {{ $adress->distrito }}</h4>
                        </div>
                        <div class="col-2">
                              <img src="{{ url('app-store/img/icons/close.svg') }}" alt="">
                        </div>
                  </div>
                  <input type="hidden" name="adress" value="{{ $adress->id }}">
            </div>
            @endif
            @empty

            @endforelse
      </div>
      <div class="container mt-4">
            <div class="morada text-right">
                  <button type="button" class="btn btn-cadastrar">Alterar</button>
            </div>
      </div>
      <div class="mt-4">
            <div class="container">
                  <div class="morada">
                        <p>TAXA DE ENTREGA</p>
                  </div>
            </div>
            <div class="tax">
                  <div class="container">
                        <p>@if ($taxa != null)
                            {{  '€ '.number_format($taxa->value, 2, ',', '.') }}
                            @else
                            Sem taxa
                        @endif</p>
                  </div>
            </div>
      </div>
      <div class="mt-4">
            <div class="container">
                  <div class="morada">
                        <p>FORMA DE PAGAMENTO</p>
                  </div>
            </div>
            <div class="pag">
                  <div class="container">
                        <div class="row pag-in">
                              <div class="col-6">
                                    <p>Transferência Bancária</p>
                              </div>
                              <div class="col-5">
                                    <button type="button" class="btn btn-voltar">Alterar</button>
                              </div>
                        </div>
                        <input type="hidden" name="payment" value="Transferência Bancária">
                        <input type="hidden" name="shipment" value="Entrega Padrão">

                  </div>
            </div>

      </div>

      <div class="mt-4">
            <div class="container">
                  <div class="morada">

                        <p>ITENS</p>
                  </div>
            </div>
            <div class="title-back">
                  <div class="container">
                        <div class="row title-check">
                              <div class="col-3">
                                    <h4>ESPÉCIME</h4>
                              </div>
                              <div class="col-2">
                                    <h4>QUANT</h4>
                              </div>
                              <div class="col-2">
                                    <h4>VALOR</h4>
                              </div>
                              <div class="col-3">
                                    <h4>EMBARCAÇÃO</h4>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="status">
                  <div class="container">
                        @forelse (Cart::getContent() as $item)
                        <div class="d-flex mt-5 status-in">
                              <div class="item text-uppercase row">

                                    <div class="col-4">
                                          <p>{{ $item->name }}</p>
                                    </div>
                                    <div class="col-2">
                                          <p>{{ $item->quantity }} KG</p>
                                    </div>
                                    <div class="col-2">
                                          <p>{{  '€ '.number_format($item->price, 2, ',', '.') }}</p>
                                    </div>

                                    <div class="col-4 d-flex flex-column">
                                          <button
                                                class="btn btn-status0 mb-2">{{ $item->attributes->embarcacao }}</button>
                                          <a href="{{ route('store.cart.remove', $item->id) }}"> <button type="button"
                                                      class="btn btn-status0 bg-danger mt-4">REMOVER</button></a>
                                    </div>
                              </div>
                        </div>
                        @empty
                        <h3>Carrinho Vazinho!</h3>
                        @endforelse

                  </div>
            </div>
      </div>
      </div>
      <div class="finalizar">
            <div class="container">
                  <div class="py-4">
                        <p>Subtotal: {{  '€ '.number_format(Cart::getSubTotal(), 2, ',', '.') }}</p>
                        <p>Taxa de Entrega: € 00,00</p>
                        <h3>Total: {{  '€ '.number_format(Cart::getTotal(), 2, ',', '.') }}</h3>
                  </div>
            </div>

      </div><a href="{{ route('user.pedidos') }}">
      <div class="container my-4">
            <div class="text-right">
                  <button type="submit" class="btn btn-voltar mx-auto">FINALIZAR</button>
            </div>
      </div>
</form>
@endsection
