@extends('layouts.painel.index')


@section('content')
    <div class="card m-5 col-md-10">
        <p>Dashboard</p>
        <p>Bem vindo, {{ auth()->user()->name }}</p>
    </div>
@endsection
