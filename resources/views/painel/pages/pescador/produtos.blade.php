@extends('layouts.painel.index')


@section('content')

<div class="card m-5 col-md-10">
    <p>Pescador</p>

      <table class="table">
            <thead class="thead-dark">
                  <tr>
                        <th scope="col">Espécie</th>
                        <th scope="col">Quatidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Tempo</th>
                        <th scope="col">Ação</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($produtos as $item)

                  <tr>
                        <th scope="row">{{ $item->especies->nome_portugues }}</th>
                        <td>{{ $item->quantidade }}{{ $item->unidade }}</td>
                        <td>{{ $item->preco }}</td>
                        <td>
                              <div id="clock"
                                    data-countdown="{{ date('Y-m-d H:i:s', strtotime("+1 days", strtotime($item->created_at))) }}">

                              </div>
                        </td>
                        <td>
                              <div class="d-flex">
                                    <div class="mx-1">
                                         <a href="{{ route('admin.pescador.produto.edit', $item->id) }}"> <button class="btn btn-info btn-sm">Editar</button></a>
                                    </div>
                                    <div class="mx-1">
                                          <form action="{{ route('admin.pescador.produto.status', $item->id) }}">
                                                @csrf
                                                @if($item->status == 0)
                                                <input type="hidden" value="1" name="status">
                                                <button type="submit" class="btn btn-danger btn-sm">Desativar</button>
                                                @else
                                                <input type="hidden" value="0" name="status">
                                                <button type="submit" class="btn btn-success btn-sm">Ativar</button>
                                                @endif


                                          </form>
                                    </div>

                              </div>
                        </td>
                  </tr>

                  @endforeach

            </tbody>
      </table>


</div>

@endsection
