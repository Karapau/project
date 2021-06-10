@extends('layouts.app-store')


@section('content')

    <div class="header">
        <div class="container">
            <div class="text-center mx-auto py-5">
                <a href="{{ route('store.index') }}"> <img src="{{ url('app-store/img/logo.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex top mt-3 justify-content-around">
            <div>
                <button class="botao btn-voltar">VOLTAR</button>
            </div>
            <div>
                <button class="botao btn-filtrar">FILTRAR</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="status d-flex mt-5 ">
            <div class="item">
                <a  href="#">CARAPAU 10 KG € 10,00</a>
            </div>
            <div>
                <button class="botao btn-status1">TRANSPORTE</button>
            </div>
        </div>
        <div class="status d-flex mt-5 ">
            <div class="item">
                <a  href="#">CARAPAU 10 KG € 10,00</a>
            </div>
            <div>
                <button class="botao btn-status0">PREPARAÇÃO</button>
            </div>
        </div>
        <div class="status d-flex mt-5 ">
            <div class="item">
                <a  href="#">CARAPAU 10 KG € 10,00</a>
            </div>
            <div>
                <button class="botao btn-status2">ENTREGUE</button>
            </div>
        </div>
        <div class="status d-flex mt-5 ">
            <div class="item">
                <a  href="#">CARAPAU 10 KG € 10,00</a>
            </div>
            <div>
                <button class="botao btn-status2">ENTREGUE</button>
            </div>
        </div>
        <div class="status d-flex mt-5 ">
            <div class="item">
                <a  href="#">CARAPAU 10 KG € 10,00</a>
            </div>
            <div>
                <button class="botao btn-status2">ENTREGUE</button>
            </div>
        </div>
        

    </div>



@endsection
