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
                        <th scope="col">Total</th>
                        <th scope="col">Acão</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->user_name }}</td>

                            <td>
                                @if ($order->status == 0) AGUARDANDO PAGAMENTO
                                @elseif($order->status == 1) ANÁLISE FINANCEIRA
                                @elseif($order->status == 2) PAGAMENTO ACEITO
                                @elseif($order->status == 3) CANCELADO
                           @endif
                            </td>
                            <td>
                                {{ '€ ' . number_format($order->total, 2, ',', '.') }}
                            </td>
                            <td>
                                <div class="d-flex">

                                    <div>
                                        <a href="{{ route('admin.pedidos.completo', $order->id) }}"> <button
                                                class="btn btn-primary ml-2">Ver Pedido</button></a>
                                    </div>
                              @if ($order->payImage)
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
