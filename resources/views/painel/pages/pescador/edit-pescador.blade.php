@extends('layouts.painel.index')


@section('content')
<div class="card m-5 col-md-10">
    <p>Pescador Editar</p>
      <form action="{{ route('admin.pescador.update', $pescador->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" value="{{ $pescador->name }}" name="name">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Sobrenome</label>
                        <input type="text" class="form-control" value="{{ $pescador->lastname }}" name="lastname">
                  </div>

                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">E-mail</label>
                        <input type="email" class="form-control" value="{{ $pescador->email }}" name="email">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="password" class="form-control" name="password">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Telemóvel</label>
                        <input type="text" class="form-control" value="{{ $pescador->telefone }}" name="telefone">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Morada</label>
                        <input type="text" class="form-control" value="{{ $pescador->morada }}" name="morada">
                  </div>

                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">IBAN</label>
                        <input type="text" class="form-control" value="{{ $pescador->iban }}" name="iban">
                  </div>
                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">NIF</label>
                        <input type="text" class="form-control" value="{{ $pescador->nif }}" name="nif">
                  </div>

                  <div class="form-group col-md-8">
                        <label for="exampleInputEmail1">Nome da Embarcação</label>
                        <input type="text" class="form-control" value="{{ $pescador->nome_embarcacao }}"
                              name="nome_embarcacao">
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
