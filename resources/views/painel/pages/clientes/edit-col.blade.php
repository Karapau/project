@extends('layouts.painel.index')


@section('content')

<div class="card m-5 col-md-10">
      <form action="{{ route('admin.update.coletivo', $comprador->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                  <div class="col-md-6">
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Nome da Empresa</label>
                              <input type="text" class="form-control" value="{{ $comprador->name }}" name="name">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Telefone</label>
                              <input type="text" class="form-control" value="{{ $comprador->telemovel }}"
                                    name="lastname">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" class="form-control" value="{{ $comprador->email }}" name="email">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Senha</label>
                              <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Confirmar Senha</label>
                              <input type="password" class="form-control" name="confirm-password">
                        </div>

                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Morada</label>
                              <input type="text" class="form-control" value="{{ $comprador->coletivos[0]->morada }}" name="morada">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Contato</label>
                              <input type="text" class="form-control" value="{{ $comprador->coletivos[0]->contato }}" name="morada">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Telefone do Contato</label>
                              <input type="text" class="form-control" value="{{ $comprador->coletivos[0]->telefone }}" name="morada">
                        </div>
                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">Telemóvel do Contato</label>
                              <input type="text" class="form-control" value="{{ $comprador->coletivos[0]->telemovel_empresa }}" name="morada">
                        </div>

                        <div class="form-group col-md-12">
                              <label for="exampleInputEmail1">NIF</label>
                              <input type="text" value="{{ $comprador->coletivos[0]->nif }}" class="form-control" name="nif">
                        </div>
                        <div class="form-group col-md-6">
                              <label for="exampleInputEmail1"></label>
                              <input type="submit" class="form-control btn btn-dark" value="Cadastrar">
                        </div>
                  </div>
            </div>
      </form>
</div>


@endsection
