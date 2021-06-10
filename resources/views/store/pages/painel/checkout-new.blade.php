@extends('layouts.app-store')


@section('content')
<div class="header">
      <div class="container">
            <div class="text-center d-flex justify-content-end mx-auto py-5">
                  <a href="javascript:history.back()"> <button class="btn btn-voltar">VOLTAR</button></a>
            </div>
      </div>
</div>
<div class="container">
      <div class="morada mt-4">
            <p>Sitios Salvos</p>
      </div>
      <div class="end">
            <div class="end-in row align-items-center justify-content-center">
                  <div class="col-2">
                        <img src="{{ url('app-store/img/icons/location.svg') }}" alt="">
                  </div>
                  <div class="col-8">
                        <h4>Av da Republica, 1290 - Villa Nova de Gaia</h4>
                  </div>
                  <div class="col-2">
                        <img src="{{ url('app-store/img/icons/close.svg') }}" alt="">
                  </div>
            </div>
      </div>
</div>
<div class="container mt-4">
      <div class="morada text-right">
            <button class="btn btn-cadastrar">Alterar</button>
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
                  <p>€ 0,0</p>
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
                              <button class="btn btn-voltar">Alterar</button>
                        </div>
                  </div>
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

                  <div class="d-flex mt-5 status-in">
                        <div class="item text-uppercase row">
<<<<<<< HEAD
                            
=======
                              {{-- <a href="#">{{ $order->products->name }} - {{ $order->products->quantity }} KG -
                              {{  '€ '.number_format($order->products->price, 2, ',', '.') }}</a> --}}
                              <div class="col-4">
>>>>>>> main
                                    <p>CARAPAU</p>
                              </div>
                              <div class="col-2">
                                    <p>10 KG</p>
                              </div>
                              <div class="col-2">
                                    <p>€ 10,00</p>
                              </div>

                              <div class="col-4 d-flex flex-column">
                                    <button class="btn btn-status0 mb-2">TESTE</button>
                                    <button class="btn btn-status0 bg-danger pb-2">REMOVER</button>
                              </div>
                        </div>
                  </div>

            </div>
      </div>
</div>
<div class="finalizar">
      <div class="container">
            <div class="py-4">
                  <p>Subtotal: € 30,00</p>
                  <p>Taxa de Entrega: € 00,00</p>
                  <h3>Total: €34,90</h3>
            </div>
      </div>

</div>
<div class="container my-4">
      <div class="text-right">
            <button type="submit" class="btn btn-voltar mx-auto">FINALIZAR</button>
      </div>
</div>
@endsection