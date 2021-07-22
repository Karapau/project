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
        <div class="d-flex top mt-3 justify-content-around">
            <div>
                <a href="{{ route('store.index') }}"><button class="btn btn-voltar">VOLTAR</button></a>
            </div>
            <div>
                <button class="btn btn-filtrar">FILTRAR</button>
            </div>
        </div>
    </div>
    <div class="status">
        @foreach ($user_orders as $order)
            <a href="{{ route('user.pedido.produto', $order->id) }}">
                <div class="pedido my-4">
                    <div class="pedidos-header row justify-content-between">
                        <div class="col-4">
                            <h4>ID</h4>
                        </div>

                        <div class="col-4">
                            <h4>Total</h4>
                        </div>
                        <div class="col-4">
                            <h4>Status</h4>
                        </div>
                    </div>
                    <div class="pedidos-body row justify-content-between">
                        <div class="col-4">
                            <h4>#{{ $order->id }}</h4>
                        </div>
                        <div class="col-4">
                            <h4>{{ '€ ' . number_format($order->total, 2, ',', '.') }}</h4>
                        </div>
                        <div class="col-4 status-pedido">
                            <h4>
                                @if ($order->status == 0)
                                    Aguardando pagamento
                                @elseif ($order->status == 1)
                                    Análise Financeira
                                @elseif ($order->status == 2)
                                    Pago
                                @elseif ($order->status == 3)
                                    Cancelado
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
