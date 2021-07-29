@extends('layouts.front-app.store.auth')

@section('content')
@component('components.auth.login', ['route' => route('consultor.login')])

@endcomponent

@endsection
