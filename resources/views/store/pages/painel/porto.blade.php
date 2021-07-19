@extends('layouts.app-store')


@section('content')

<div class="header">
      <div class="container">
            <div class="text-center mx-auto py-5">
                  <a href="{{ route('store.index') }}"> <img src="{{ url('app-store/img/logo.svg') }}" alt=""></a>
            </div>
      </div>
</div>

<div class="text-center">
      <a href="/store-index" class="btn btn-voltar1">VOLTAR</a>
</div>
<div class="container">
      <div class="d-flex top mt-3  justify-content-around">
            <div>
                  <h3>Escolha<br> um Porto</h3>
            </div>

            <div class="accordion">
                  <div>
                        <button class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                              aria-controls="collapseExample">FILTRAR</button>
                  </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="collapse" id="collapseExample">
                              <div class="form-group">
                                    <input type="text" id="search" name="search" class="form-control" placeholder="Buscar Porto..." x-webkit-speech>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="portos mt-4">
            <div class="row">
                  @foreach ($portos as $porto)
                  <div class="col-6">
                        <a href="{{ route('store.produto', $porto->id) }}"> <img
                                    src="{{ url('storage/portos/'.$porto->image) }}" alt=""></a>
                        <p>{{ $porto->nome }}</p>
                  </div>
                  @endforeach
            </div>
      </div>
</div>

@endsection


