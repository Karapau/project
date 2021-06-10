@extends('layouts.app-comercial')


@section('content')
<div class="header">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
      </div>
      <div class="text-center text-white p-5">
            <h4>KARAPAU</h4>
      </div>
</div>

<div class="">
      @if (Session::has('errors'))
      <div class="alert alert-danger">
            @foreach (Session::get('errors') as $error)
            Test<br />
            @endforeach
      </div>
      @endif
      <div class="container mt-3 px-5 login-px">
            <form action="{{ route('store.login.post') }}" method="POST">
                  @csrf
                  <div class="group"><input type="text" name="email" required="required" /><span
                              class="highlight"></span><span class="bar"></span><label>Email</label>
                  </div>
                  <div class="group"><input type="password" name="password" required="required" /><span
                              class="highlight"></span><span class="bar"></span><label>Senha</label>
                  </div>
                  <div class="btn-box py-4"><button class="btn btn-submit" type="submit">Entrar</button>

                  </div>
            </form>
      </div>
</div>
@endsection