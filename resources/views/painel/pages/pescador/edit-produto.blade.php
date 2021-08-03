@extends('layouts.painel.index')

@section('content')
<div class="card m-5 col-md-10">
    <p>Pescador Editar</p>
      <form action="{{ route('admin.pescador.produto.update', $produto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                  <div class="form-group col-md-8">
                        <label for="exampleFormControlSelect1">Espécie</label>
                        <select name="especie_id" class="form-control" id="exampleFormControlSelect1">
                              <option value="{{ $produto->especies->id }}">{{ $produto->especies->nome_portugues }} | Atual </option>

                              @foreach ($especies as $especie)
                              <option value="{{ $especie->id }}">{{ $especie->nome_portugues }}</option>
                              @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleFormControlSelect1">Porto</label>
                        <select name="porto_id" class="form-control" id="exampleFormControlSelect1">
                              <option value="{{ $produto->portos->id }}">{{ $produto->portos->nome }} | Atual </option>

                              @foreach ($portos as $porto)
                              <option value="{{ $porto->id }}">{{ $porto->nome }}</option>
                              @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Embarcação</label>
                        <input type="text" class="form-control" value="{{ $produto->embarcacao }}" name="embarcacao">
                  </div>

                  @php $arr = ['tamanho1','tamanho2','tamanho3','tamanho4']; @endphp
                  <div class="form-group col-md-8">
                        <label for="exampleFormControlSelect1">Tamanho</label>
                        <select name="tamanho" class="form-control" id="exampleFormControlSelect1">
                              @foreach ($arr as $item)
                              <option value="{{ $item }}" @if($produto->tamanho=== $item) selected='selected' @endif>
                                    @if($item == 'tamanho1')
                                    Tamanho 1 (T1)
                                    @elseif($item == 'tamanho2')
                                    Tamanho 2 (T2)
                                    @elseif($item == 'tamanho3')
                                    Tamanho 3 (T3)
                                    @elseif($item == 'tamanho4')
                                    Tamanho 4 (T4)
                                    @endif
                              </option>
                              @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Quantidade</label>
                        <input type="text" class="form-control" value="{{ $produto->quantidade }}" name="quantidade">
                  </div>
                  @php $arr2 = ['kg','unid']; @endphp
                  <div class="form-group col-md-8">
                        <label for="exampleFormControlSelect1">Unidade</label>
                        <select name="unidade" class="form-control" id="exampleFormControlSelect1">
                              @foreach ($arr2 as $item)
                              <option value="{{ $item }}" @if($produto->unidade=== $item) selected='selected' @endif>
                                    @if($item == 'kg')
                                    Kg
                                    @elseif($item == 'unid')
                                    Unid

                                    @endif
                              </option>
                              @endforeach
                        </select>
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Preço</label>
                        <input type="text" class="form-control" value="{{ $produto->preco }}" name="preco">
                  </div>
                  <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                              aria-describedby="emailHelp" value="Atualizar">
                  </div>


            </div>
      </form>
</div>



@endsection
