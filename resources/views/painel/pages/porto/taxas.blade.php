@extends('layouts.painel')


@section('content')

<p>Taxa de entrega {{ $porto->nome }}</p>
<div class="col-md-12">
      <form action="{{ route('admin.porto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row col-md-6">
                  <input type="hidden" name="porto_id" value="{{ $porto->id }}">

                  <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Valor</label>
                        <input type="text" name="value" class="form-control">
                  </div>


                  <div class="form-groupv mt-2 col-md-6">
                        <label for="exampleInputEmail1"></label>
                        <input type="submit" class="form-control btn btn-dark" id="exampleInputEmail1"
                              aria-describedby="emailHelp" value="Cadastrar">
                  </div>

            </div>
      </form>
      <div class="col-md-6">
        <h4>Taxa Atual: {{  '€ '.number_format($taxa->value, 2, ',', '.') }}</h4>
      </div>
</div>

@endsection
