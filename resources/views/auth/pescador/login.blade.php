@extends('layouts.app-pescador')

@section('content')
<div class="header">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
      </div>
      <div class="text-center text-white p-5">
            <h4>PESCADOR</h4>
      </div>
      <div class="container d-flex">
            <div class="mx-auto">
                  <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item" role="presentation">
                              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Registo</a>
                        </li>

                  </ul>

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
<div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container login-px">
                  <form action="{{ route('pescador.login') }}" method="POST">
                        @csrf
                        @csrf
                        <div class="group"><input type="email" name="email" required="required" /><span
                                    class="highlight"></span><span class="bar"></span><label>Email</label>
                        </div>
                        <div class="group"><input type="password" name="password" required="required" /><span
                                    class="highlight"></span><span class="bar"></span><label>Senha</label>
                        </div>
                        <div class="btn-box py-4"><button class="btn btn-submit" type="submit">Entrar</button>

                        </div>
                  </form>
            </div>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container">
                  <form action="{{ route('pescador.store') }}" method="POST">
                        @csrf
                        <div class="px-4 pt-4">
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="name" id="name-field">
                                    <label for="name-field">Nome</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="lastname" id="name-field">
                                    <label for="name-field">Sobrenome</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="email" class="form-control" name="email" id="name-field">
                                    <label for="name-field">E-mail</label>
                              </div>

                              <div class="form-group input-material">
                                    <input type="password" class="form-control" name="password" id="name-field">
                                    <label for="name-field">Senha</label>
                              </div>

                              <div class="form-group input-material">
                                    <input type="password" class="form-control" name="password-confirm" id="name-field">
                                    <label for="name-field">Confirmar Senha</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="number" class="form-control" name="telefone" id="name-field">
                                    <label for="name-field">Telemóvel</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="morada" id="name-field">
                                    <label for="name-field">Morada</label>
                              </div>

                              <div class="row">
                                    <div class="form-group input-material col-6">
                                          <input type="number" class="form-control" name="nif" id="name-field">
                                          <label for="name-field">NIF</label>
                                    </div>
                                    <div class="form-group input-material col-6">
                                          <input type="number" class="form-control" name="iban" id="name-field">
                                          <label for="name-field">IBAN</label>
                                    </div>
                              </div>
                              <div class="form-group input-material">

                                    <select class="form-control" name="porto" id="name-field">
                                          <option>Escolha o Porto de Registo</option>
                                          @foreach ($portos as $porto)
                                          <option value="{{ $porto->id }}">{{ $porto->nome }}</option>
                                          @endforeach

                                    </select>
                              </div>
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="nome_embarcacao" id="name-field">
                                    <label for="name-field">Nome da Embarcação 1</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="nome_embarcacao2" id="name-field">
                                    <label for="name-field">Nome da Embarcação 2</label>
                              </div>
                              <div class="form-group input-material">
                                    <input type="text" class="form-control" name="nome_embarcacao3" id="name-field">
                                    <label for="name-field">Nome da Embarcação 3</label>
                              </div>
                              <div class="btn-box py-4"><button class="btn btn-submit" type="submit">Cadastrar</button>

                              </div>
                        </div>
                  </form>
            </div>
      </div>

</div>


@endsection