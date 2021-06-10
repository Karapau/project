@extends('layouts.app-pescador')

@section('content')


<div class="header">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
      </div>
</div>
<div>
      <div class="d-flex justify-content-between container voltar py-4 mb-5">
            <div>
                  <a href="javascript:history.back()"> <i class="fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div>
                  <span>LISTA DE PEIXES</span>
            </div>
      </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
      </ul>
</div>
@endif

<div class="list ">
      <div class="container">
            <div class="d-flex justify-content-around text-center">
                  <div>
                        <p>Espécie</p>
                  </div>
                  <div>
                        <p>Quant</p>
                  </div>
                  <div>
                        <p>Preço</p>
                  </div>
                  <div>
                        <p>Tempo</p>
                  </div>
            </div>
      </div>
      @foreach ($produtos as $produto)
      <div class="repeat">
            <div class="for">
                  <div class="container">
                        <div class="d-flex  justify-content-around text-center">
                              <div class="nome">
                                    <h5 class="text-center">{{ $produto->especies->nome_portugues }}</h5>
                              </div>
                              <div >
                                    <h5>{{ $produto->quantidade_kg }} Kg</h5>
                              </div>
                              <div >
                                    <h5>{{ $produto->preco }}</h5>
                              </div>
                              <div >
                                    <div id="clock"
                                          data-countdown="{{ date('Y-m-d H:i:s', strtotime("+1 days", strtotime($produto->created_at))) }}">

                                    </div>
                              </div>
                        </div>

                  </div>

            </div>
            <div class="">
                  <div class="text-center mt-4 mb-4">
                        <a class="btn btn-danger bg-danger text-white" href="{{ route('pescador.produto.delete', $produto->id) }}">Apagar</a>
                  </div>
            </div>
      </div>
      @endforeach
</div>


{{-- <div>
      <table class="table">
            <thead>
                  <tr>
                        <th scope="col">Especie</th>
                        <th scope="col">Imagem</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Tempo</th>
                        <th scope="col">Acões</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($produtos as $produto)
                  <tr>
                        <th scope="row">
                              {{ $produto->especies->nome_portugues }}
</th>
<td><img width="40" src="{{ url('storage/especies/'.$produto->especies->image) }}" alt=""></td>
<td>{{ $produto->preco }}</td>
<td>
      <div id="clock" data-countdown="{{ date('Y-m-d H:i:s', strtotime("+1 days", strtotime($produto->created_at))) }}">
      </div>
</td>
<td>
      <button disabled class="btn btn-danger">Apagar</button>
</td>
</tr>
@endforeach

</tbody>
</table>
</div> --}}

@endsection