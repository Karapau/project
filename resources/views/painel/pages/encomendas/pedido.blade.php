@extends('layouts.painel.index')


@section('content')
    <div class="card m-5 col-md-10">
        <p>Pedidos</p>

        <div class="container">
            <h2 class="text-center">Pedido</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{ $user_order->id }}</li>
                <li class="list-group-item">TOTAL: {{ '€ ' . number_format($user_order->total, 2, ',', '.') }}</li>
                <li class="list-group-item">FRETE: {{ '€ ' . number_format($user_order->frete, 2, ',', '.') }}</li>
                <li class="list-group-item">Método de Pagamento: {{ $user_order->payment_mothod }}</li>
                <li class="list-group-item">Comprador: {{ $user_order->user_name }}</li>
                <li class="list-group-item">Email do Comprador: {{ $user_order->email }}</li>
                <li class="list-group-item">Telemóvel do Comprador: {{ $user_order->telemovel }}</li>
                {{-- <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->products->status }}</li> --}}
                <li class="list-group-item bg-danger text-white" data-toggle="modal" data-target="#exampleModal">Status:
                    @if ($user_order->status == 0) Aguardando Pagamento
                    @elseif($user_order->status == 1) Análise Financeira
                    @elseif($user_order->status == 2) Pagamento Aceito
                    @elseif($user_order->status == 3) Cancelado
                        @endif <span><i class="fas fa-external-link-alt"></i></span>

                </li>

            </ul>

            <h2 class="text-center mt-5">Produtos</h2>

            @foreach ($orders as $order)
                <ul class="list-group list-group-flush mt-4 mb-4">
                    <li class="list-group-item">Produto: {{ $order->products->name }}</li>
                    <li class="list-group-item">Preço: {{ '€ ' . number_format($order->products->price, 2, ',', '.') }}
                    </li>
                    <li class="list-group-item">Quantidade: {{ $order->products->quantity }} Kg</li>
                    <li class="list-group-item">Pescador: {{ $order->pescador->name }}
                        {{ $order->pescador->lastname }}</li>
                    <li class="list-group-item">Total:
                        {{ '€ ' . number_format($order->products->total_value, 2, ',', '.') }}</li>
                    <li class="list-group-item">Vai receber:
                        {{ '€ ' . number_format($order->products->value, 2, ',', '.') }}</li>
                    <li class="list-group-item bg-danger open text-white" data-toggle="modal"
                        data-id="{{ $order->products->id }}" data-target="#status">Status:
                        @if ($order->products->status == 0) Aguardando Liberação
                        @elseif($order->products->status == 1) A liberar
                        @elseif($order->products->status == 2) Transporte
                        @elseif($order->products->status == 3) Entregue
                        @elseif($order->products->status == 4) Cancelado
                            @endif <span><i class="fas fa-external-link-alt"></i></span>
                    </li>
                </ul>
            @endforeach


            <h2 class="text-center mt-5">Endereço</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Morada: {{ $order->adresses->morada }}</li>
                <li class="list-group-item">Código Postal: {{ $order->adresses->codigo_postal }}</li>
                <li class="list-group-item">Região: {{ $order->adresses->regiao }}</li>
                <li class="list-group-item">Distrito: {{ $order->adresses->distrito }}</li>
                <li class="list-group-item">Conselho: {{ $order->adresses->distrito }}</li>
                <li class="list-group-item">Freguesia: {{ $order->adresses->freguesia }}</li>
            </ul>



        </div>
        <style>
            .modal-backdrop {
                position: unset !important;
            }

            .modal-dialog {
                margin-top: 15% !important;

            }

        </style>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/user/order/status/' . $user_order->id) }}" method="post">
                            @csrf

                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="2">
                                    <label class="form-check-label text-success" for="exampleRadios1">
                                        Pago
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="3">
                                    <label class="form-check-label text-danger" for="exampleRadios1">
                                        Cancelar
                                    </label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Alterar Status</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="status" tabindex="-1" aria-labelledby="status" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/user/produto/status/') }}" method="post">
                            @csrf
                            <input type="hidden" name="idproduto" value="">
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="2">
                                    <label class="form-check-label text-success" for="exampleRadios1">
                                        Transporte
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="3">
                                    <label class="form-check-label text-success" for="exampleRadios1">
                                        Entregue
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                        value="4">
                                    <label class="form-check-label text-danger" for="exampleRadios1">
                                        Cancelar
                                    </label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-success">Alterar Status</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
