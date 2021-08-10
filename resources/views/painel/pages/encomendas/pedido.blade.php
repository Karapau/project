@extends('layouts.painel.index')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div><h3 class="card-tilte">Pedidos</h3></div>
                            <div class="ml-auto"><a href="{{route('admin.encomendas')}}" class="btn btn-info btn-sm">Voltar</a></div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Nº PEDIDO</th>
                                            <th>Itens</th>
                                            <th>Caixas</th>
                                            <th></th>
                                            <th>TOTAL</th>
                                            <th>Taxa Entrega</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-active">
                                            <td>{{$user_order->codigo}}</td>
                                            <td>{{$arrayGeral->itens}}</td>
                                            <td>{{$arrayGeral->caixas}}</td>
                                            <td>
                                                <button type="button" class="btn btn-dark btn-sm">FATURAR</button>

                                            </td>
                                            <td>€ {{number_format($user_order->total, 2, ',', '.')}}</td>
                                            <td>€ {{number_format($user_order->frete, 2, ',', '.')}}</td>
                                            <td>
                                                <form action="{{ url('admin/user/order/status/' . $user_order->id) }}" method="POST">
                                                    @csrf
                                                    @if ($user_order->status != 2)
                                                    <input  type="hidden" name="status" id="exampleRadios1"
                                                    value="2">
                                                    <button type="submit" class="btn btn-success">Pago</button>
                                                    @else
                                                    <input  type="hidden" name="status" id="exampleRadios1"
                                                    value="3">
                                                    <button type="submit" class="btn btn-danger">Cancelar</button>
                                                    @endif

                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $ordemPedido = 0;
                                        @endphp
                                        @foreach ($orders->products2 as $userProduct)
                                        @php
                                            $ordemPedido++;
                                        @endphp
                                            <tr>
                                                <td colspan="7">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="table-light">
                                                                <th>Item</th>
                                                                <th>Pescador</th>
                                                                <th>Caixas</th>
                                                                <th>Espécime</th>
                                                                <th>Peso</th>
                                                                <th>Valor</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="table-light">
                                                                <td>{{str_pad($ordemPedido, 2, '0', STR_PAD_LEFT)}}</td>
                                                                <td><button type="button" data-toggle="modal" data-target="#pescadorModal" class="btn btn-dark btn-sm">{{$userProduct->pescador->name}}</button></td>
                                                                <td>{{$userProduct->caixas}}</td>
                                                                <td>{{$userProduct->name}}</td>
                                                                <td>{{$userProduct->quantity}} Kg</td>
                                                                <td>€ {{number_format($userProduct->price, 2, ',', '.')}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="table-active">
                                                <td colspan="7">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Comprador</th>
                                                                <th>Telemóvel</th>
                                                                <th>Morada</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#compradorModal">{{$comprador->name}}</button></td>
                                                                <td>{{$comprador->telemovel}}</td>
                                                                <td>{{$address->morada}}, {{$address->porta}} / {{$address->codigo_postal}} / {{$address->conselho}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="7">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="table-light">
                                                                <th>Porto Origem</th>
                                                                <th>Status</th>
                                                                <th>Sage</th>
                                                                <th>PDF</th>
                                                                <th>Entregador</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="table-light">
                                                                <td><button type="button" class="btn btn-dark btn-sm">{{$userProduct->origem}}</button></td>
                                                                <td><button type="button" class="btn {{$userProduct->status == 0 ? 'btn-dark' : 'btn-success'}} btn-sm @if($userProduct->status == 0) btn_liberar_pedido @endif"  data-route="{{route('admin.status.produto')}}" data-id="{{$userProduct->id}}">{{$userProduct->status == 0 ? 'A LIBERAR' : 'LIBERADO'}}</button></td>
                                                                <td><button type="button" class="btn btn-dark btn-sm">ENVIAR</button></td>
                                                                <td><button type="button" class="btn btn-dark btn-sm">GERAR</button></td>
                                                                <td><button type="button" class="btn btn-dark btn-sm">ESCOLHER ENTREGADOR</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pescadorModal" tabindex="-1" aria-labelledby="pescadorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pescadorModalLabel">Dados do Pescador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 py-2 px-3"><b>Nome:</b> {{$userProduct->pescador->name}} {{$userProduct->pescador->lastname}}</div>
                        <div class="col-12 py-2 px-3"><b>Email:</b> {{$userProduct->pescador->email}}</div>
                        <div class="col-12 py-2 px-3"><b>Telemóvel:</b> {{$userProduct->pescador->telefone}}</div>
                        <div class="col-12 py-2 px-3"><b>Morada:</b> {{$userProduct->pescador->morada}}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="compradorModal" tabindex="-1" aria-labelledby="compradorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="compradorModalLabel">Comprador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 py-2 px-3"><b>Nome:</b> {{$comprador->name}} {{$comprador->lastname}}</div>
                        <div class="col-12 py-2 px-3"><b>Email:</b> {{$comprador->email}}</div>
                        <div class="col-12 py-2 px-3"><b>Telemóvel:</b> {{$comprador->telemovel}}</div>
                        <div class="col-12 py-2 px-3"><b>Morada:</b> {{$address->morada}}, {{$address->porta}} / {{$address->codigo_postal}} / {{$address->conselho}}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
