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
                  <span>CADASTRO DE COMPRADOR</span>
            </div>
      </div>
</div>
<div>
      <div class="container cadastro d-flex flex-column align-items-center login-py">

            <div class="cad text-center my-auto col-5">
                  <a href="{{ route('consultor.comprador-individual.create') }}"> <img class="mb-3" src="{{ url('app-comercial/img/ind.svg') }}" alt="">
                        <p>INDIVIDUAL</p>
                  </a>
            </div>

            <div class="cad text-center col-5 ">
                  <a href="{{ route('consultor.comprador-coletivo.create') }}"><img class="mb-3" src="{{ url('app-comercial/img/col.svg') }}" alt="">
                        <p>COLETIVO</p>
                  </a>
            </div>

      </div>
</div>

@endsection