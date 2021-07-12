@extends('layouts.painel')


@section('content')

<p>Estatisticas diarias do porto {{ $porto->nome }}</p>
<div class="col-md-12">
      <form action="{{ route('admin.estatistica.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-md-6">
                  <input type="hidden" name="porto_id" value="{{ $porto->id }}">
                  <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Espécie</label>
                        <select class="form-control" name="especie" id="">
                              @foreach ($porto->especies as $item)
                              <option value="{{ $item->nome_portugues }}">{{ $item->nome_portugues }}</option>
                              @endforeach

                        </select>
                  </div>
                  <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Valor Minimo</label>
                        <input type="text" name="preco_minimo" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Valor Médio</label>
                        <input type="text" name="preco_medio" class="form-control">
                  </div>
                  <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Valor Maximo</label>
                        <input type="text" name="preco_maximo" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                              aria-describedby="emailHelp" value="Cadastrar">
                  </div>

            </div>
      </form>
</div>
<div>
      <table class="table">
            <thead>
                  <tr>
                        <th scope="col">Espécie</th>
                        <th scope="col">Preco Minimo</th>
                        <th scope="col">Preço Médio</th>
                        <th scope="col">Preço Maximo</th>
                        <th scope="col">Data</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($estatisticas as $est)

                      <tr>
                                          <th scope="row">{{ $est->especie }}</th>
                                          <td>{{ $est->preco_minimo }}</td>
                                          <td>{{ $est->preco_medio }}</td>
                                          <td>{{ $est->preco_maximo }}</td>
                                          <td>{{ date('d/m/Y', strtotime($est->created_at)) }}</td>
                                    </tr>


                  @endforeach

            </tbody>
      </table>
</div>

@endsection
