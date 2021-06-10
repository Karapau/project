@extends('layouts.painel')


@section('content')
<p>Pedidos</p>

<div class="container">
      <table class="table">
            <thead>
                  <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pagamento</th>
                        <th scope="col">Comprador</th>
                        <th scope="col">Ver</th>
                  </tr>
            </thead>
            <tbody>
                
                  @foreach ($pedidos as $pedido)

                  <tr>
                        <th scope="row">{{ $pedido->id }}</th>
                        <td>{{ $pedido->orders->payment_mothod }}</td>
                        <td>{{ $pedido->orders->user_name }}</td>
                        <td>
                              <a href="{{ route('admin.pescador.pedidos.completo', $pedido->id) }}"> <button
                                          class="btn btn-dark">Ver Completo</button></a>
                        </td>
                  </tr>

                  @endforeach
                
            </tbody>
      </table>
</div>




@endsection