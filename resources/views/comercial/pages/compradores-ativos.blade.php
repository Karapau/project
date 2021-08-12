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
                <span>COMPRADORES ATIVOS</span>
          </div>
    </div>
</div>
<div class="in-p pad">
    <div class="row container text-center">
          <div class="col-4">
                <p>Dias</p>
          </div>
          <div class="col-4">
                <p>COMPRADOR</p>
          </div>
          <div class="col-4">
                <p>STATUS</p>
          </div>
    </div>
    @foreach ($ativos as $comp)
    <div class="ativo my-3 text-center py-3">
          <div class="container row">
                <div class="col-4 dia">
                 <p>0</p>
                </div>
                <div class="col-4">
                     {{ $comp->name }}
                </div>
                <div class="col-4">
                    <span>ativo</span>
                </div>
          </div>
    </div>
    @endforeach





</div>
@endsection
