@extends('layouts.painel.index')


@section('content')

    <div class="container card m-5 col-md-10">
        <div>
            <p>Clientes</p>
        </div>
        <table class="table table-sm table-dark">
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
{{ $compradores->links() }}

    </div>

@endsection
