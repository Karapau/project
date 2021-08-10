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
                                            <th>AÇÂO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-active">
                                            <td>{{$user_order->codigo}}</td>
                                            <td>{{$arrayGeral->itens}}</td>
                                            <td>{{$arrayGeral->caixas}}</td>
                                            <td><button type="button" class="btn btn-dark btn-sm">FATURAR</button></td>
                                            <td>€ {{number_format($user_order->total, 2, ',', '.')}}</td>
                                            <td>€ {{number_format($user_order->frete, 2, ',', '.')}}</td>
                                            <td><span><i class="fas fa-eye"></i></span> <span><i class="fas fa-file"></i></span></td>
                                        </tr>
                                        @foreach ($orders->products as $userProduct)
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
                                                                <td>01</td>
                                                                <td><button type="button" class="btn btn-dark btn-sm">{{$userProduct->pescador->name}}</button></td>
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
                                                                <td><button type="button" class="btn btn-dark btn-sm">{{$comprador->name}}</button></td>
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
                                            <tr>
                                                <td colspan="7" class="text-right"><button type="button" class="btn btn-info btn-sm">ATUALIZAR</button></td>
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
@endsection
