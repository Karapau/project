@extends('layouts.painel.index')

@section('content')
<div class="card m-5 col-md-10">
    <p>Espécies</p>
      <form action="{{ route('admin.especies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome Comum Português</label>
                              <input type="text" required class="form-control" name="nome_portugues">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome Comum Inglês</label>
                              <input type="text" class="form-control" name="nome_ingles">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome Comum Espanhol</label>
                              <input type="text" class="form-control" name="nome_espanhol">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome Cientifico</label>
                              <input type="text" class="form-control" name="nome_cientifico">
                        </div>

                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Código FAO</label>
                              <input type="text" class="form-control" name="codigo_fao">
                        </div>
                  </div>
                  <div class="col-md-6 ">

                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Código Lota</label>
                              <input type="text" class="form-control" name="codigo_lota">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Tamanho Minimo</label>
                              <input type="text" class="form-control" name="tamanho_minimo">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Margem %</label>
                              <input type="text" class="form-control" name="margem">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Fotografia</label>
                              <input type="file" required class="form-control" name="image">
                        </div>
                        <div class="form-group col-md-6">
                             <label for="exampleInputEmail1"></label>
                              <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" value="Cadastrar">
                        </div>


                  </div>
            </div>
      </form>
</div>


@endsection
