@extends('layouts.painel.index')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div><h3 class="card-tilte">Pedidos</h3></div>
                            <div class="ml-auto"><a href="{{route('entregador')}}" class="btn btn-info btn-sm">Voltar</a></div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Nº PEDIDO</th>
                                            <th>Itens</th>
                                            <th>Caixas</th>
                                            <th>Aceitar</th>
                                            <th>Entrega concluida?</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-active">
                                            <td>{{$userProduct->orders->codigo}}</td>
                                            <td>{{$userProduct->item}}</td>
                                            <td>{{$userProduct->caixas}}</td>
                                            <td><button type="button" class="btn btn-dark btn-sm">SIM</button></td>
                                            <td><button type="button" class="btn btn-dark btn-sm">AGUARDANDO</button></td>
                                            <td><button type="button" class="btn btn-dark btn-sm">GERAR</button></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="table-light">
                                                            <th>Item</th>
                                                            <th>Pescador</th>
                                                            <th>Caixas</th>
                                                            <th>Espécime</th>
                                                            <th>Peso</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-light">
                                                            <td>01</td>
                                                            <td><button type="button" class="btn btn-dark btn-sm">{{$userProduct->pescador->name}}</button></td>
                                                            <td>{{$userProduct->caixas}}</td>
                                                            <td>{{$userProduct->name}}</td>
                                                            <td>{{$userProduct->quantity}} Kg</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td colspan="3"></td>
                                        </tr>
                                        <tr class="table-active">
                                            <td colspan="6">
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
                                                            <td>{{$comprador->name}}</td>
                                                            <td>{{$comprador->telemovel}}</td>
                                                            <td>{{$address->morada}}, {{$address->porta}} / {{$address->codigo_postal}} / {{$address->conselho}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="table-light">
                                                            <th>Porto Origem</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="table-light">
                                                            <td><button type="button" class="btn btn-dark btn-sm">{{$userProduct->origem}}</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td colspan="3"></td>
                                        </tr>
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