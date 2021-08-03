@extends('layouts.painel.index')


@section('content')

<div class="card m-5 col-md-10">
      <form action="{{ route('admin.porto.update', $porto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                  <div class="">
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome do Porto</label>
                              <input type="text" class="form-control" value="{{ $porto->nome }}" name="nome">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Foto do Porto</label>
                              <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1"></label>
                              <input type="checkbox" name="registro" @if ($porto->registro == 'on')
                                  checked
                                  @else
                              @endif id="registo">
                              <label class="form-check-label" for="defaultCheck1">
                                    Porto de Registo
                              </label>
                        </div>
                        <div class=" col-md-6">
                              <label for="exampleInputEmail1"></label>
                              <input name="descarga" type="checkbox" id="descarga" @if ($porto->descarga == 'on')
                                  checked @else
                              @endif>
                              <label class="form-check-label" for="defaultCheck1">
                                    Porto de Descarga
                              </label>
                        </div>
                        <div id="cientifico" class="form-group d-none col-md-12">
                              <label for="exampleInputEmail1">Controle Veterinario</label>
                              <input type="text" class="form-control" value="{{ $porto->controle_veterinario }}" name="controle_veterinario">
                        </div>
                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1">Espécies do Porto</label>
                              <select class="js-example-basic-multiple" name="especies[]" multiple="multiple">
                                    @foreach ($especies as $especie)
                                    <option value="{{ $especie->id }}">{{ $especie->nome_portugues }}</option>
                                    @endforeach

                              </select>
                        </div>
                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1"></label>
                              <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="Cadastrar">
                        </div>
                  </div>
                  <div class="col-md-6 ">



                  </div>
            </div>
      </form>
</div>

<script>

</script>
@endsection
