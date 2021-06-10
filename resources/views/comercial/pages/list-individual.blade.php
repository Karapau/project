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
                  <span>{{ $comprador1->nome }}</span>
            </div>
      </div>
</div>

<div class="container pb-4">
      <div class="bg-light ">
            <ul class="mdc-list mdc-list--two-line">
                  <li class="mdc-list-item" tabindex="0">
                        <span class="mdc-list-item__ripple"></span>
                        <span class="mdc-list-item__text">
                              <span class="mdc-list-item__primary-text">Nome</span>
                              <span class="mdc-list-item__secondary-text">{{ $comprador1->nome }} {{ $comprador1->sobrenome }}</span>
                        </span>
                  </li>
                  <li class="mdc-list-item">
                        <span class="mdc-list-item__ripple"></span>
                        <span class="mdc-list-item__text">
                              <span class="mdc-list-item__primary-text">E-mail</span>
                              <span class="mdc-list-item__secondary-text">{{ $comprador1->email }}</span>
                        </span>
                  </li>
                  <li class="mdc-list-item">
                        <span class="mdc-list-item__ripple"></span>
                        <span class="mdc-list-item__text">
                              <span class="mdc-list-item__primary-text">Telemóvel</span>
                              <span class="mdc-list-item__secondary-text">{{ $comprador1->telemovel }}</span>
                        </span>
                  </li>
                  <li class="mdc-list-item">
                        <span class="mdc-list-item__ripple"></span>
                        <span class="mdc-list-item__text">
                              <span class="mdc-list-item__primary-text">Morada</span>
                              <span class="mdc-list-item__secondary-text">{{ $comprador1->morada }}</span>
                        </span>
                  </li>
                  <li class="mdc-list-item">
                        <span class="mdc-list-item__ripple"></span>
                        <span class="mdc-list-item__text">
                              <span class="mdc-list-item__primary-text">NIF</span>
                              <span class="mdc-list-item__secondary-text">{{ $comprador1->nif }}</span>
                        </span>
                  </li>
         
            </ul>
      </div>
</div>


@endsection