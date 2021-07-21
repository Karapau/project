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
                        <th scope="col">Pescador</th>
                        <th scope="col">Acão</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->users->name }}</td>

                            <td>
                                @if($order->products->status
                                == 0) AGUARDANDO PAGAMENTO
                              @elseif($order->products->status == 1) ANÁLISE FINANCEIRA
                              @elseif($order->products->status == 2) PAGAMENTO ACEITO
                              @elseif($order->products->status == 3) A LIBERAR
                              @elseif($order->products->status == 4) EM TRANSPORTE
                              @elseif($order->products->status == 5) ENTREGUE
                              @elseif($order->products->status == 6) CANCELADO @endif
                            </td>
                            <td>
                              {{ $order->pescador->name }}
                            </td>
                            <td>
                                <div class="d-flex">

                                    <div>
                                        <a href="{{ route('admin.pescador.pedidos.completo', $order->id) }}"> <button
                                                class="btn btn-primary ml-2">Ver Pedido</button></a>
                                    </div>
                                    @if ($order->payImage != null)
                                    <div>
                                        <a href="{{ route('admin.encomendas.download', $order->id) }}"> <button
                                                class="btn btn-dark ml-2">Baixar Comprovante</button></a>
                                    </div>
                                    @endif

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>


@endsection
