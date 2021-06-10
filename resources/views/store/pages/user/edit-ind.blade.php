@extends('layouts.app-store')


@section('content')
<div class="header-top">
      <div class="container">
            <div class="d-flex icons">
                  <div class="mx-3">
                        <img src="{{ url('app-store/img/icons/icone-notificacoes.svg') }}" alt="">
                  </div>
                  <div class="mx-3">
                        <img src="{{ url('app-store/img/icons/edit-off.svg') }}" alt="">
                  </div>

            </div>

      </div>
</div>

<div class="container">
      <div class="title">
            <p>Olá, {{ auth()->user()->nome }}</p>
      </div>

      <div class="mt-4">
            <form action="{{ route('store.user.update', auth()->user()->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                        <label for="exampleInputEmail1">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ $user->nome }}">

                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" value="{{ $user->sobrenome }}">

                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Telemóvel</label>
                        <input type="text" class="form-control" name="telemovel" value="{{ $user->telemovel }}">

                  </div>
                  <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                  </div>
                  <div class="text-center">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                  </div>
            </form>
      </div>
      <div class="text-center mt-5">
           <a href="{{ route('store.adress') }}"> <button class="btn btn-primary">Endereços</button></a>
      </div>
</div>

@endsection