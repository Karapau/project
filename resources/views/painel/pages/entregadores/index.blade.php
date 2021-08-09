@extends('layouts.painel.index')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3 class="card-tilte">Pedidos</h3></div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nº PEDIDO</th>
                                            <th>Itens</th>
                                            <th>Caixas</th>
                                            <th>Ações</th>
                                            <th>Status</th>
                                            <th>Caixas devolvidas?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userProducts as $userProduct)
                                            @if ($userProduct->orders->status == 2)
                                                <tr>
                                                    <td>{{$userProduct->orders->codigo}}</td>
                                                    <td>{{$userProduct->item}}</td>
                                                    <td>{{$userProduct->caixas}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{route('entregador.dados', $userProduct->id)}}" class="btn btn-info btn-sm">VER</a>
                                                            <button type="button" class="btn btn-dark btn-sm">ACEITAR</button>
                                                        </div>
                                                    </td>
                                                    <td><button type="button" class="btn btn-dark btn-sm">AGUARDANDO</button></td>
                                                    <td><button type="button" class="btn btn-dark btn-sm">SIM</button></td>
                                                </tr>
                                            @endif
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