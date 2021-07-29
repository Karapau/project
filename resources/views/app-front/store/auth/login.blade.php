@extends('layouts.front-app.store.auth')

@section('content')
@component('components.auth.login', ['route' => route('store.login.post')])

@endcomponent

@endsection
