@extends('layouts.app-comercial')


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
                  <span>UPDATE COMPRADOR</span>
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
<div class="container login-py">
      <form action="{{ route('consultor.update.coletivo', $comprador_col->id) }}" method="POST">
            @csrf
            <div class="form-group input-material">
                  <input type="text" class="form-control"  value="{{ $comprador_col->nome }}" name="nome" id="name-field">
                  <label for="name-field">Nome da Empresa</label>
            </div>

            <div class="form-group input-material">
                  <input type="text" class="form-control" value="{{ $comprador_col->telefone }}" name="telefone" id="name-field">
                  <label for="name-field">Telefone da Empresa</label>
            </div>

            <div class="form-group input-material">
                  <input type="text" class="form-control" value="{{ $comprador_col->telemovel_empresa }}" name="telemovel_empresa" id="name-field">
                  <label for="name-field">Telemovel da Empresa</label>
            </div>

            <div class="form-group input-material">
                  <input type="email" class="form-control" value="{{ $comprador_col->email }}" name="email" id="name-field">
                  <label for="name-field">E-mail</label>
            </div>
            <div class="form-group input-material">
                  <input type="text" class="form-control" value="{{ $comprador_col->morada }}" name="morada" id="name-field">
                  <label for="name-field">Morada</label>
            </div>

            <div class="form-group input-material">
                  <input type="text" class="form-control" value="{{ $comprador_col->nif }}" name="nif" id="name-field">
                  <label for="name-field">Nif da Empresa</label>
            </div>
            <div class="form-group input-material">
                  <input type="text" class="form-control" value="{{ $comprador_col->contato }}" name="contato" id="name-field">
                  <label for="name-field">Contato</label>
            </div>
            <div class="form-group input-material">
                  <input type="number" class="form-control" value="{{ $comprador_col->telemovel }}" name="telemovel" id="name-field">
                  <label for="name-field">Telemóvel</label>
            </div>


            <div class="row">
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="peixaria" type="radio" id="radio-1"
                                          name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">PEIXARIA</label>
                        </div>
                  </div>
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="retalho" type="radio" id="radio-1"
                                          name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">RETALHO</label>
                        </div>
                  </div>
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="outros" type="radio" id="radio-1"
                                          name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">OUTROS</label>
                        </div>
                  </div>
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="restauracao" type="radio"
                                          id="radio-1" name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">RESTAURAÇÃO</label>
                        </div>
                  </div>
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="varina" type="radio" id="radio-1"
                                          name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">VARINA</label>
                        </div>
                  </div>
                  <div class="col-6">
                        <div class="mdc-form-field">
                              <div class="mdc-radio">
                                    <input class="mdc-radio__native-control" value="hotelaria" type="radio" id="radio-1"
                                          name="tipo">
                                    <div class="mdc-radio__background">
                                          <div class="mdc-radio__outer-circle"></div>
                                          <div class="mdc-radio__inner-circle"></div>
                                    </div>
                                    <div class="mdc-radio__ripple"></div>
                              </div>
                              <label class="" for="radio-1">HOTELARIA</label>
                        </div>
                  </div>

            </div>
            <div class="btn-box py-4"><button class="btn btn-submit" type="submit">SALVAR</button>

            </div>
      </form>

</div>
@endsection