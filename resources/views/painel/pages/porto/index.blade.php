@extends('layouts.painel.index')


@section('content')


<div class="card m-5 col-md-10">
    <p>Portos</p>
      <div>
            <a href="{{ route('admin.porto.create') }}"><button class="btn btn-dark my-2">Adicionar
                        Porto</button></a>
            <table class="table table-striped">
                  <thead>
                        <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Porto</th>
                              <th scope="col">Foto</th>
                              <th scope="col">Acão</th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach ($portos as $porto)
                        <tr>
                              <th scope="row">{{ $porto->id }}</th>
                              <td>{{ $porto->nome }}</td>
                              <td>
                                    <img width="70" height="70" src="{{ asset('storage/portos/'.$porto->image) }}"
                                          alt="">
                              </td>
                              <td>
                                    <div class="d-flex">
                                          <div>
                                                <a href="{{ route('admin.porto.delete', $porto->id) }}"
                                                      onclick="return confirm('Você tem certeza?');"> <button
                                                            class="btn btn-danger ">Apagar</button></a>
                                          </div>
                                          <div>
                                                <a href="{{ route('admin.porto.edit', $porto->id) }}"> <button
                                                            class="btn btn-primary ml-2">Editar</button></a>
                                          </div>
                                          <div>
                                                <a href="{{ route('admin.estatistica', $porto->id) }}"> <button
                                                            class="btn btn-dark ml-2">Estatisticas Diarias</button></a>
                                          </div>
                                          <div>
                                                <a href="{{ route('admin.porto.tax', $porto->id) }}"> <button
                                                            class="btn btn-info ml-2">Taxas</button></a>
                                          </div>
                                          <div>
                                                <form action="{{ route('admin.porto.update.status', $porto->id) }}">
                                                      @csrf
                                                      @if($porto->status == 0)
                                                      <input type="hidden" value="1" name="status">
                                                      <button type="submit" class="btn btn-warning ml-2">Desativar</button>
                                                      @else
                                                      <input type="hidden" value="0" name="status">
                                                      <button type="submit" class="btn btn-success ml-2">Ativar</button>
                                                      @endif


                                                </form>
                                          </div>
                                    </div>
                              </td>
                        </tr>
                        @endforeach


                  </tbody>
            </table>
           {{ $portos->links() }}
      </div>
</div>
@endsection
