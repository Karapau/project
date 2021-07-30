@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top">
        <div class="logo">
            <img src="{{ url('front-app/store/assets/img/logo.svg') }}" alt="">
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="{{ route('store.index') }}">VOLTAR</a>
    </div>
    <div class="container">
        <div class="filtrar">
            <p>ESCOLHA UM <br> PORTO</p>
            <div>
                <button class="btn btn-filtro" data-bs-toggle="modal" data-bs-target="#exampleModal">FILTRAR</button>
            </div>
            @component('components.modal.filtro-modal', ['title' => 'Buscar Porto'])
                <div class="form-group">
                    <input type="search" id="search" name="search" class="form-control" placeholder="Buscar Porto..."
                        x-webkit-speech>
                </div>
            @endcomponent
        </div>
    </div>

    <div class="portos mt-4 text-center">
        <div class="row mb-5">
            @foreach ($portos as $porto)
                <div class="col-6 scale-in-center">
                    <div class="porto">
                        <a href="{{ route('store.produto', $porto->id) }}"> <img
                                src="{{ url('storage/portos/' . $porto->image) }}" alt=""></a>
                    </div>
                    <p>{{ $porto->nome }}</p>
                </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection
