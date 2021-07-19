@extends('layouts.app-store')


@section('content')
    <div class="header-top">
        <div class="container">
            <div class="d-flex icons">
                <div class="mx-3">
                    <img src="{{ url('app-store/img/icons/icone-notificacoes.svg') }}" alt="">
                </div>
                <div class="mx-3">
                    <img src="{{ url('app-store/img/icons/edit-off.svg') }}" alt="">
                </div>

            </div>

        </div>
    </div>

    <div class="container">
        <div class="title">
            <p>Olá, {{ auth()->user()->name }}</p>
        </div>

        <div class="mt-4 ">
            <form action="{{ route('store.adress.save') }}" method="POST">
                @csrf
                <div class="form-group">

                    <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">

                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">Código Postal</label>
                        <input id="cep" type="text" class="form-control" name="codigo_postal">

                    </div>
                    <div style="margin-top: 32px;" class="col-6">
                        <button id="buscar" type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Morada</label>
                    <input type="text" class="form-control" id="morada" name="morada">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Região</label>
                    <input type="text" class="form-control" id="regiao" name="regiao">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Distrito</label>
                    <input type="text" class="form-control" id="distrito" name="distrito" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Concelho</label>
                    <input type="text" class="form-control" id="conselho" name="conselho" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Freguesia</label>
                    <input type="text" class="form-control" id="freguesia" name="freguesia" id="exampleInputPassword1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Numero da Porta</label>
                    <input type="text" class="form-control" id="porta" name="porta" id="exampleInputPassword1">
                </div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
                <div class="text-center my-4">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>

    </div>

@endsection
