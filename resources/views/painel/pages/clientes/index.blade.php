@extends('layouts.painel.index')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="row mt-2 justify-content-between">
                                <div class="col-12 col-md-4"><h4>Clientes</h4></div>
                                <div class="col-12 col-md-8">
                                    <form action="{{route('admin.clientes')}}" method="get">
                                        <div class="row">
                                            <div class="form-group col-12 col-md-5">
                                                <input type="text" class="form-control" value="@isset($_GET['email']){{$_GET['email']}}@endisset" name="email" placeholder="Filtrar por Email">
                                            </div>
                                            <div class="form-group col-12 col-md-5">
                                                <select name="status" id="" class="form-control">
                                                    <option value="">Selecione um Status</option>
                                                    <option value="1" @isset($_GET['status']){{$_GET['status'] == 1 ? 'selected' : ''}}@endisset>Ativo</option>
                                                    <option value="0" @isset($_GET['status']){{$_GET['status'] == 0 ? 'selected' : ''}}@endisset>Inativo</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-12 col-md-2">
                                                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                                <a href="{{route('admin.clientes')}}" class="btn btn-warning"><i class="fas fa-eraser"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm table-dark mb-2">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Comercial</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Acão</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compradores as $comp1)
                                        <tr class="@if ($comp1->status == 0) bg-danger @else bg-success @endif ">
                                            <th scope="row">{{ $comp1->id }}</th>
                                            <td>{{ $comp1->name }}</td>
                                            <td>{{ $comp1->email }}</td>
                                            <td>
                                                @if ($comp1->user_id == 1)
                                                    Site
                                                @else
                                                    {{ $comp1->comercial->name ?? ''}}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($comp1->status == 0)
                                                Inativo @else
                                                    Ativo
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex ac">
                                                    <div>
                                                        @if ($comp1->type == 'individual')
                                                            <a href="{{ route('admin.clientes.edit-ind', $comp1->id) }}"><button
                                                                    class="btn btn-sm btn-dark">Editar</button></a>
                                                        @elseif($comp1->type == 'coletivo')
                                                            <a href="{{ route('admin.clientes.edit-col', $comp1->id) }}"><button
                                                                    class="btn btn-sm btn-dark">Editar</button></a>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <form action="{{ route('admin.update.status', $comp1->id) }}" method="POST">
                                                            @csrf
                                                            @if ($comp1->status == 0)
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" class="btn btn-sm btn-success">Ativar</button>
                                                            @else
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" class="btn btn-sm btn-danger">Inativar</button>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if (isset($_GET['email']) && isset($_GET['status']))
                                {{ $compradores->appends(['email'=>$_GET['email'], 'status'=>$_GET['status']])->links() }}
                            @else
                                {{ $compradores->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
