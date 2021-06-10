@extends('layouts.painel')


@section('content')
<p>Pescador</p>


<div class="container">
      <table class="table">
            <thead class="thead-dark">
                  <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Embarcação</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ação</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($pescadores as $pescador)
                  <tr>
                        <th scope="row">{{ $pescador->name }}</th>
                        <td>{{ $pescador->nome_embarcacao }}</td>
                        <td>{{ $pescador->email }}</td>
                        <td>
                              <div class="d-flex">
                                    <div class="mx-1">
                                          <a href="{{ route('admin.pescador.produtos', $pescador->id) }}"><button
                                                      class="btn btn-dark btn-sm">Ver Produtos</button></a>
                                    </div>
                                    <div class="mx-1">
                                          <a href="{{ route('admin.pescador.edit', $pescador->id) }}"><button
                                                      class="btn btn-primary btn-sm">Editar</button></a>
                                    </div>
                                    <div class="mx-1">
                                          <form action="{{ route('admin.pescador.update.status', $pescador->id) }}">
                                                @csrf
                                                @if($pescador->status == 0)
                                                <input type="hidden" value="1" name="status">
                                                <button type="submit" class="btn btn-danger btn-sm">Desativar</button>
                                                @else
                                                <input type="hidden" value="0" name="status">
                                                <button type="submit" class="btn btn-success btn-sm">Ativar</button>
                                                @endif


                                          </form>
                                    </div>
                                    <div class="mx-1">
                                         <a href="{{ route('admin.pescador.pedidos', $pescador->id) }}"> <button class="btn btn-info btn-sm">Ver Encomendas</button></a>
                                    </div>
                              </div>
                        </td>
                  </tr>
                  @endforeach


            </tbody>
      </table>

      {{ $pescadores->links() }}
</div>
@endsection