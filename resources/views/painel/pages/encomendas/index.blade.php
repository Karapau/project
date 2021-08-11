@extends('layouts.painel.index')


@section('content')
    <div class="card m-5 col-md-10">
        <p>Espécies</p>

        <div>
            <div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Numero do Pedido</th>
                            <th scope="col">Nome do Comprador</th>
                            <th scope="col">Status</th>
                            <th></th>
                            <th scope="col">Total</th>
                            <th scope="col">Acão</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th>{{ $order->codigo }}</th>
                                <td>{{ $order->user_name }}</td>

                                <td>
                                    @if ($order->status == 0) AGUARDANDO PAGAMENTO
                                    @elseif($order->status == 1) ANÁLISE FINANCEIRA
                                    @elseif($order->status == 2) PAGAMENTO ACEITO
                                    @elseif($order->status == 3) CANCELADO
                                    @endif
                                </td>
                                <td>
                                    @if($order->fatura)
                                    <button type="button" class="btn btn-dark btn-sm ml-2">Faturarado</button>
                                    @else
                                    <div>
                                        <form action="{{ route('admin.status.fatura', $order->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="fatura" value="1">
                                            <button type="submit" class="btn btn-primary btn-sm ml-2">Faturar</button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    {{ '€ ' . number_format($order->total, 2, ',', '.') }}
                                </td>

                                <td>
                                    <div class="d-flex justify-content-between icones">

                                        <div>
                                            <a href="{{ route('admin.pedidos.completo', $order->id) }}"><i
                                                    class="far fa-eye"></i> </a>
                                        </div>
                                        @if ($order->payImage)
                                            <div class="ml-3">
                                                <a href="{{ route('admin.encomendas.download', $order->id) }}"><i
                                                        class="far fa-file-alt"></i></a>
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

    </div>
@endsection
