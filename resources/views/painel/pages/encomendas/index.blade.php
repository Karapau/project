@extends('layouts.painel')


@section('content')

<p>Espécies</p>

<div>
      <div>

            <table class="table table-striped">
                  <thead>
                        <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Nome do Comprador</th>
                              <th scope="col">Status</th>
                              <th scope="col">Acão</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($orders as $order)
                          <tr>
                                                <th scope="row">{{ $order->id }}</th>
                                                <td>{{ $order->user_name }}</td>
                                                <td>
                                                    @if($order->status == 0) Aguardando
                  @elseif($order->status == 1) Em Preparação @elseif($order->status == 2) Saiu
                  Para Entrega @elseif($order->status == 3) Entregue @endif</td>
                                                </td>
                                                <td>
                                                      <div class="d-flex">
                                                            <div>
                                                                 <a href="{{ route('admin.especies.delete', $order->id) }}" onclick="return confirm('Você tem certeza?');"> <button class="btn btn-danger ">Apagar</button></a>
                                                            </div>
                                                            <div>
                                                                 <a href="{{ route('admin.pescador.pedidos.completo', $order->id) }}"> <button class="btn btn-primary ml-2">Ver Pedido</button></a>
                                                            </div>
                                                      </div>
                                                </td>
                                          </tr>
                        @endforeach

                  </tbody>
            </table>

      </div>
</div>


@endsection
