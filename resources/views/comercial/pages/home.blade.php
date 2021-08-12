@extends('layouts.app-comercial')

@section('content')
<div class="">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo.svg') }}" alt="">
            </div>
      </div>
</div>
<div class="">
      <div class="title">
            <div class="container px-4 d-flex justify-content-between">
                  <div class="pt-3">
                        <h4>Olá, {{ auth()->user()->name  }} {{ auth()->user()->lastname  }}</h4>
                  </div>
                  <div>
                        <a href="{{ route('consultor.logout') }}"> <span class="iconify" data-inline="false"
                                    data-icon="ls:logout"
                                    style="color: #ffffff; font-size: 38.42677688598633px;"></span></a>
                  </div>
            </div>
      </div>
      @php
      $value = 0;
  @endphp
  @foreach ($wallet as $wal)
  @if ($wal->orders)
      @if ( $wal->orders->status != 0 AND $wal->orders->status != 1 AND $wal->orders->status != 4)
@php
     $value += $wal->value;
@endphp
@endif
@endif
  @endforeach
      <div class="container mt-2">
            <div class="wallet d-flex px-4">
                  <div class="py-4 ">

                        <a href=""><i class="fas fa-wallet a-2"></i> Seu Wallet</a>
                        <h3 class="balance"> {{  '€ '.number_format($value, 2, ',', '.') }}</h3>
                  </div>
                <div class="col-4 eye">
                      <span onclick="hide()"><i class="fas fa-eye"></i></span>
                </div>
                <div class="col-4 eye-close d-none">
                      <span onclick="show()"><i class="fas fa-eye-slash"></i></span>
                </div>
            </div>
      </div>
      @php $comp = $comprador1->count()  @endphp
      {{-- @php $comp_ativo = $ativos_individual->count() + $ativos_coletivo->count() @endphp --}}
      <div class="container mt-3">
            <div class="ativos px-4">
                  <div class="py-4">
                        <a href=""> <i class="fas fa-thumbs-up"></i> Compradores Ativos</a>
                        <h3>{{ $ativos->count() }}/100</h3>
                  </div>
            </div>
      </div>

      {{-- @php $comp_inativo = $inativos_individual->count() + $inativos_coletivo->count() @endphp --}}
      <div class="container mt-3">
            <div class="inativos px-4">
                  <div class="py-4">
                        <a href=""> <i class="fas fa-thumbs-down"></i> Compradores Inativos</a>
                        <h3>{{ $inativos->count() }}</h3>
                  </div>
            </div>
      </div>
      @php $comp = $comprador1->count()  @endphp
      {{-- @php $comp_incompleto = count($incomplete_col) + count($incomplete_ind) @endphp --}}
      <div class="container mt-3">
            <div class="incompletos px-4">
                  <div class="py-4">
                        <a href=""> <i class="fas fa-ban"></i> CADASTROS INCOMPLETOS</a>
                        <h3>{{ count($incomplete_ind) }}</h3>
                  </div>
            </div>
      </div>
      <div class="container pb-5 mt-3">
            <div class="menu row">
                  <div class="col-5 text-center altura pl">
                        <a href="{{ url('comprador-cad') }}"><span class="iconify" data-inline="false"
                                    data-icon="bx:bx-user-plus"
                                    style="color: #36a6d4; font-size: 75.05713653564453px;"></span>
                              <p>CADASTRO DE COMPRADOR</p>
                        </a>
                  </div>
                  <div class="col-5 text-center altura pl">
                        <a href=""><span class="iconify mb-2 pt-2" data-inline="false" data-icon="vaadin:piggy-bank"
                                    style="color: #36a6d4; font-size: 56px;"></span>
                              <p>VER SEU
                                    EXTRACTO</p>
                        </a>
                  </div>
                  <div class="col-5 text-center mt-3  altura pl">
                        {{-- <a href="{{ route('consultor.compradores.ativo') }}"><i style="color: #36a6d4; font-size: 56px;"
                                    class="fas fa-thumbs-up mb-2 pb-2"></i>
                              <p>VER ATIVOS</p>
                        </a> --}}
                        <a href="#"><i style="color: #36a6d4; font-size: 56px;"
                                    class="fas fa-thumbs-up mb-2 pb-2"></i>
                              <p>VER ATIVOS</p>
                        </a>
                  </div>

                  <div class="col-5 text-center mt-3 pt-4 altura pl">
                        <a class="py-4" href="{{ route('consultor.compradores.inativo') }}"><span class="iconify mb-2" data-inline="false"
                                    data-icon="fluent:thumb-dislike-24-filled"
                                    style="color: #de1313; font-size: 53px;"></span>
                              <p>VER INATIVOS</p>
                        </a>
                  </div>

                  <div class="col-5 text-center mt-3  altura pl">
                        <a href="{{ route('consultor.list.incompletos') }}"><i style="color: #35A40E; font-size: 56px;" class="fas fa-ban"></i></i>
                              <p>VER INCOMPLETOS</p>
                        </a>
                  </div>
                  <div class="col-5 text-center mt-3 altura pl">
                        <a href="{{ route('consultor.lead') }}"><i style="color: #35A40E; font-size: 56px;" class="fab fa-envira"></i></span>
                              <p>CADASTRAR LEAD</p>
                        </a>
                  </div>
            </div>
      </div>






      {{--
      <div class="">
            <div class="container menu-ic">
                  <div class="row pt-3 text-center">
                        <div class="col-4 text-center">
                              <a href="{{ url('comprador-cad') }}"><i class="fas fa-user-plus a-1"></i>Cadastrar
      Comprador</a>
</div>
<div class="col-4">
      <a href="{{ route('consultor.compradores') }}"><i class="fas fa-users a-2"></i>Compradores</a>
</div>
<div class="col-4">
      <a href=""><i class="fas fa-wallet a-2"></i>Wallet</a>
</div>
<div class="col-4">
      <a href=""><i class="fas fa-history a-3"></i>Histórico</a>
</div>
</div>
</div>
</div> --}}
</div>


@endsection
