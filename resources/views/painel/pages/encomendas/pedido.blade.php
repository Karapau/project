@extends('layouts.painel')


@section('content')
    <p>Pedidos</p>

    <div class="container">
        <h2 class="text-center">Pedido</h2>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: {{ $user_order->id }}</li>
            <li class="list-group-item">Método de Pagamento: {{$user_order->payment_mothod }}</li>
            <li class="list-group-item">Comprador: {{ $user_order->user_name }}</li>
            <li class="list-group-item">Email do Comprador: {{ $user_order->email }}</li>
            <li class="list-group-item">Telemóvel do Comprador: {{ $user_order->telemovel }}</li>
            {{-- <li class="list-group-item">Telemóvel do Comprador: {{ $pedido->products->status }}</li> --}}
            <li class="list-group-item bg-danger text-white" data-toggle="modal" data-target="#exampleModal">Status:
                @if ($user_order->status == 0) Aguardando Pagamento
            @elseif($user_order->status == 1) Análise Financeira
            @elseif($user_order->status == 2) Pagamento Aceito
            @elseif($user_order->status == 3) Cancelado
             @endif <span><i class="fas fa-external-link-alt"></i></span></li>

</ul>

<h2 class="text-center mt-5">Produtos</h2>

@foreach ($orders as $order)
<ul class="list-group list-group-flush mt-4 mb-4">
    <li class="list-group-item">Produto: {{ $order->products->name }}</li>
    <li class="list-group-item">Preço: {{ '€ ' . number_format($order->products->price, 2, ',', '.') }}</li>
    <li class="list-group-item">Quantidade: {{ $order->products->quantity }}Kg</li>
</ul>
@endforeach


<h2 class="text-center mt-5">Endereço</h2>
{{-- <ul class="list-group list-group-flush">
    <li class="list-group-item">Morada: {{ $pedido->adresses->morada }}</li>
    <li class="list-group-item">Código Postal: {{ $pedido->adresses->codigo_postal }}</li>
    <li class="list-group-item">Região: {{ $pedido->adresses->regiao }}</li>
    <li class="list-group-item">Distrito: {{ $pedido->adresses->distrito }}</li>
    <li class="list-group-item">Conselho: {{ $pedido->adresses->distrito }}</li>
    <li class="list-group-item">Freguesia: {{ $pedido->adresses->freguesia }}</li>
</ul> --}}



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
            <form action="{{ url('admin/user/produto/status/'.$user_order->id) }}" method="post">
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
