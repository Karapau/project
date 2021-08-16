@extends('layouts.painel.index')


@section('content')

    <div class="card m-5 col-md-10">
        <form action="{{ route('admin.porto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="">
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Nome do Porto</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Sigla do Porto</label>
                        <input type="text" class="form-control" name="sigla">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Foto do Porto</label>
                        <input type="file" required class="form-control" name="image">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="checkbox" name="registro" id="registo">
                        <label class="form-check-label" for="defaultCheck1">
                            Porto de Registo
                        </label>
                    </div>
                    <div class=" col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input name="descarga" type="checkbox" id="descarga">
                        <label class="form-check-label" for="defaultCheck1">
                            Porto de Descarga
                        </label>
                    </div>
                    <div id="cientifico" class="form-group d-none col-md-12">
                        <label for="exampleInputEmail1">Controle Veterinario</label>
                        <input type="text" class="form-control" name="controle_veterinario">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Espécies do Porto</label>
                        <select class="js-example-basic-multiple" required name="especies[]" multiple="multiple">
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
                <div class="col-md-6 row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Código Postal</label>
                        <input type="text" class="form-control" id="ceping" name="codigo_postal">
                    </div>
                    <div style="margin-top: 32px;" class="form-group col-md-6">
                        <button type="button" id="buscaring" class="btn btn-dark">Buscar</button>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Morada</label>
                        <input type="text" id="morada" class="form-control" name="morada">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Região</label>
                        <input type="text" id="regiao" class="form-control" name="regiao">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Porta</label>
                        <input type="text" id="porta" class="form-control" name="porta">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Distrito</label>
                        <input type="text" id="distrito" class="form-control" name="distrito">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Conselho</label>
                        <input type="text" id="conselho" class="form-control" name="conselho">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputEmail1">Freguesia</label>
                        <input type="text" id="freguesia" class="form-control" name="freguesia">
                    </div>

                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">

                </div>
            </div>
        </form>
    </div>

    <script>

    </script>
@endsection
