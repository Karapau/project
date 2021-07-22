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
                <a href="{{ route('store.index') }}"> <button class="btn btn-voltar">VOLTAR</button></a>
            </div>
            <div>
                <span>ENCOMENDA </span>
            </div>
        </div>
    </div>
    <div class="status">
        @foreach ($orders as $order)
            <div class="pedidos-single my-4">
                <div class="pedidos-body row justify-content-between">
                    <div class="col-3">
                        <h4>PRODUTO</h4>
                    </div>
                    <div class="col-3">
                        <h4>QUANT.</h4>
                    </div>
                    <div class="col-3">
                        <h4>VALOR</h4>
                    </div>
                    <div class="col-3">
                        <h4>PESCADOR</h4>
                    </div>
                </div>
                <div class="pedidos-body row justify-content-between">
                    <div class="col-3">
                        <h4>{{ $order->products->name }}</h4>
                    </div>
                    <div class="col-3">
                        <h4>{{ $order->products->quantity }} KG</h4>
                    </div>
                    <div class="col-3">
                        <h4>{{ '€ ' . number_format($order->products->price, 2, ',', '.') }} </h4>
                    </div>
                    <div class="col-3">
                        <h4>{{ $order->pescador->name }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="status">

            <div class="pedidos-single my-4">
                <div class="pedidos-body row justify-content-between">
                    <div class="col-4">
                        <h4>FRETE</h4>
                    </div>
                    <div class="col-4">
                        <h4>SUBTOTAL.</h4>
                    </div>
                    <div class="col-4">
                        <h4>TOTAL</h4>
                    </div>
                </div>
                <div class="pedidos-body row justify-content-between">
                    <div class="col-4">
                        <h4>{{ '€ ' . number_format($user_order->frete, 2, ',', '.') }}</h4>
                    </div>
                    <div class="col-4">
                        <h4>{{ '€ ' . number_format($user_order->sub_total, 2, ',', '.') }}</h4>
                    </div>
                    <div class="col-4">
                        <h4>{{ '€ ' . number_format($user_order->total, 2, ',', '.') }}</h4>
                    </div>
                </div>
            </div>

    </div>
    <div class="square">
        <div class="container">
            <div class=" itens mt-3 pt-3 text-start">
                <span>Conta para Transferência</span>
                <div>
                    <span>banco Montepio - numero de conta : 295.10.005582-7 <br> BIC/SWIFT : MPIOPTPL <br> NIB :
                        0036.0295.99100055827.07 <br> IBAN: PT50.0036.0295.99100055827.07</span>
                </div>
            </div>
        </div>
    </div>
    <div class="square">
        <div class="container">
            @if ($order->status == 0)
                <div class="itens">
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
                <span>Endereço</span>
                <div>
                    <span>
                       Morada: {{ $user_order->enderecos->morada }}, {{ $user_order->enderecos->porta }}<br>
                       Código Postal: {{ $user_order->enderecos->codigo_postal }}<br>
                       Distrito: {{ $user_order->enderecos->distrito }}<br>
                       Freguesia: {{ $user_order->enderecos->freguesia }}<br>

                    </span>
                </div>
            </div>
        </div>
    </div>


@endsection
