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
                  <span>CADASTRO DE LEAD</span>
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
      <form action="{{ route('consultor.comprador-coletivo.store') }}" method="POST">
            @csrf
            <div class="form-group input-material">
                  <input type="text" class="form-control" name="name" id="name-field">
                  <label for="name-field">Nome da Empresa</label>
            </div>

            <div class="form-group input-material">
                  <input type="email" class="form-control" name="email" id="name-field">
                  <label for="name-field">E-mail</label>
            </div>
     
 
            <div class="form-group input-material">
                  <input type="number" class="form-control" name="telemovel" id="name-field">
                  <label for="name-field">Telemóvel</label>
            </div>



</div>
<div class="btn-box py-4"><button class="btn btn-submit" type="submit">Pré Cadastrar</button>

</div>
</form>

</div>
@endsection