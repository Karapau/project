@extends('layouts.painel.index')


@section('content')

    <div class="card m-5 col-md-10">
        <p>Pedidos</p>
        <div class="">
            <h2 class="text-center">Pedido</h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">ID: {{ $pedido->orders->id }}</li>
                <li class="list-group-item">Método de Pagamento: {{ $pedido->orders->payment_mothod }}</li>
                <li class="list-group-item">Comprador: {{ $pedido->orders->user_name }}</li>
                <li class="list-group-item">Email do Comprador: {{ $pedido->orders->email }}</li>
                <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->orders->telemovel }}</li>
                {{-- <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->products->status }}</li> --}}
                <li class="list-group-item bg-danger text-white" data-toggle="modal" data-target="#exampleModal">Status:
                    @if ($pedido->products->status == 0) Aguardando Pagamento
                @elseif($pedido->products->status == 1) Análise Financeira @elseif($pedido->products->status == 2)
            Pagamento Aceito @elseif($pedido->products->status == 3) A liberar @elseif($pedido->products->status
                ==
                4)
            Transporte @elseif($pedido->products->status == 5)
            Entregue @elseif($pedido->products->status == 6)
                Cancelado @endif <span><i class="fas fa-external-link-alt"></i></span>
        </li>

    </ul>
    <h2 class="text-center mt-5">Endereço</h2>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Morada: {{ $pedido->adresses->morada }}</li>
        <li class="list-group-item">Código Postal: {{ $pedido->adresses->codigo_postal }}</li>
        <li class="list-group-item">Região: {{ $pedido->adresses->regiao }}</li>
        <li class="list-group-item">Distrito: {{ $pedido->adresses->distrito }}</li>
        <li class="list-group-item">Conselho: {{ $pedido->adresses->distrito }}</li>
        <li class="list-group-item">Freguesia: {{ $pedido->adresses->freguesia }}</li>
    </ul>
    <h2 class="text-center mt-5">Produtos</h2>

    <ul class="list-group list-group-flush mt-4 mb-4">
        <li class="list-group-item">Produto: {{ $pedido->products->name }}</li>
        <li class="list-group-item">Preço: {{ '€ ' . number_format($pedido->products->price, 2, ',', '.') }}</li>
        <li class="list-group-item">Quantidade: {{ $pedido->products->quantity }}Kg</li>

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
                <form action="{{ url('admin/user/produto/status/' . $pedido->products->id) }}" method="post">
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
                            <label class="form-check-label" for="exampleRadios1">
                                Liberar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                value="4">
                            <label class="form-check-label" for="exampleRadios1">
                                Transporte
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                value="5">
                            <label class="form-check-label" for="exampleRadios1">
                                Entregue
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1"
                                value="6">
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

@endsection
