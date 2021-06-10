@extends('layouts.app-store')


@section('content')

<div class="cart container">
      @forelse (Cart::getContent() as $item)
      <div class="row my-5">
            <div class="product-cart d-flex">
                  <div class="col-6">
                        <img src="{{ url('storage/especies/'.$item->attributes->image) }}" alt="">
                  </div>
                  <div class="col-6">
                        <h2>{{ $item->name }}</h2>
                        <h4>{{  '€ '.number_format($item->price, 2, ',', '.') }}</h4>
                        <h5>Quantidade: {{ $item->quantity }} Kg</h5>
                       <a href="{{ route('store.cart.remove', $item->id) }}"> <button class="btn btn-danger">Remover</button></a>
                  </div>
            </div>
      </div>
      @empty
      <h3>Carrinho Vazinho!</h3>
      @endforelse
      <div class="text-center">
          <a href="{{ route('store.porto') }}">  <button class="btn btn-dark">Continuar Comprando</button></a>
      </div>
</div>
<a href="{{ route('store.checkout') }}">
      <div class="bottom">
            <div class="d-flex justify-content-around">
                  <div>
                        <h5>Finalizar</h5>
                  </div>
                  <div>
                        <h5>{{  '€ '.number_format(Cart::getSubTotal(), 2, ',', '.') }}</h5>
                  </div>
            </div>
      </div>
</a>
@endsection