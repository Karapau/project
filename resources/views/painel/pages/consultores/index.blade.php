@extends('layouts.painel.index')


@section('content')
    <div class="card m-5 col-md-10">
        <p>Consultores</p>
        <a href="{{ route('admin.consultores.create') }}"><button class="btn btn-dark my-2">Adicionar
                Comercial</button></a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultores as $con)
                    <tr>
                        <th scope="row">{{ $con->id }}</th>
                        <td>{{ $con->name }}</td>
                        <td>{{ $con->email }}</td>
                        <td>
                            <img width="50" src="{{ url('storage/comerciais/' . $con->image) }}" alt="">
                        </td>
                        <td>
                            <div class="d-flex">
                                <div>
                                    <a href="{{ route('admin.consultores.delete', $con->id) }}"> <button
                                            class="btn btn-danger">Apagar</button></a>
                                </div>
                                <div class="mx-3">
                                    <a href="{{ route('admin.consultores.edit', $con->id) }}"> <button
                                            class="btn btn-primary">Editar</button></a>
                                </div>
                                <div class="mx-3">
                                    <a href="{{ route('admin.consultores.clientes', $con->id) }}"> <button
                                            class="btn btn-dark">Ver</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
