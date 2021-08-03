@extends('layouts.painel.index')


@section('content')

<div class="container card m-5 col-md-10">
      <div>
            <p>Compradores Individuais</p>
      </div>
      <table class="table table-sm table-dark">
            <thead>
                  <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Acão</th>
                  </tr>
            </thead>
            <tbody>
                  @foreach ($comprador1 as $comp1)
                  <tr class="@if($comp1->status == 0) bg-danger @else bg-success  @endif ">
                        <th scope="row">{{ $comp1->id }}</th>
                        <td>{{ $comp1->name }}</td>
                        <td>{{ $comp1->email }}</td>
                        <td>@if($comp1->status == 0)
                              Inativo @else
                              Ativo
                              @endif
                        </td>
                        <td>
                              <div class="d-flex ac">
                                    <div>
                                          <a href="{{ route('admin.consultores.email.individual', $comp1->id) }}"><button class="btn btn-sm btn-dark">Email Boas Vindas</button></a>
                                    </div>
                                    <div>
                                          <button class="btn btn-sm btn-dark">Email 2</button>
                                    </div>
                                    <div>
                                          <button class="btn btn-sm btn-dark">Email 3</button>
                                    </div>
                              </div>

                        </td>
                  </tr>
                  @endforeach

            </tbody>
      </table>

</div>

@endsection
