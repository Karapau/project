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
<div class="container login-py">
      <table class="mt-4">
            <thead>
                  <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acão</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($ativos_individual as $comp1)
                  <tr>
                        <td data-label="Nome">{{ $comp1->nome }} {{ $comp1->sobrenome }}</td>
                        <td data-label="E-mail" >{{ $comp1->email }}</td>
                        <td data-label="Status"   class="@if($comp1->status == 0) bg-danger @else bg-success @endif">
                              @if( $comp1->status == 0)
                              Inátivo
                              @else
                              Ativo
                              @endif
                        </td>
                        <td data-label="Acão">
                             <a href="{{ route('consultor.list.individual', $comp1->id) }}"><button class="btn btn-dark">Ver</button></a>
                        </td>
                  </tr>
                  @endforeach

                  @foreach ($ativos_coletivo as $comp1)
                  <tr>
                        <td data-label="Nome">{{ $comp1->nome }} {{ $comp1->sobrenome }}</td>
                        <td data-label="E-mail">{{ $comp1->email }}</td>
                        <td data-label="Status" class="@if($comp1->status == 0) bg-danger @else bg-success @endif">
                              @if( $comp1->status == 0)
                              Inátivo
                              @else
                              Ativo
                              @endif
                        </td>
                        <td data-label="Acão">
                             <a href="{{ route('consultor.list.coletivo', $comp1->id) }}"> <button class="btn btn-dark">Ver</button></a>
                        </td>
                  </tr>
                  @endforeach


            </tbody>
      </table>
</div>
@endsection