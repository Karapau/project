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
        <div class="d-flex inicio mt-3 ">
            <div>
                <button class="btn btn-voltar">VOLTAR</button>
            </div>
            <div>
                <span>ENCOMENDA 1001</span>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="detail">
            <span>Detalhes da Encomenda</span>
        </div>
    </div>

    <div class="mt-5">
        <div class="d-flex itens">
            <div>
                <span>ESPÉCIME</span>
            </div>
            <div>
                <span>QUANT</span>
            </div>
            <div>
                <span>VALOR</span>
            </div>
            <div>
                <span>STATUS</span>
            </div>
        </div>
    </div>
    <div class="square">
        <div class="container">
            <div class=" d-flex itens mt-3 pt-3">
                <div>
                    <span>SARDINHA</span>
                </div>
                <div>
                    <span>10 KG</span>
                </div>
                <div>
                    <span>€ 29,00</span>
                </div>
                <div>
                    <button class="botao-trans">TRANSPORTE</button>
                </div>
            </div>
            <div class="mt-3 text-center " id="linha-horizontal"></div>
            <div class="d-flex mt-3 avaliar">
                <button class="btn btn-primary">INFORMAR RECEBIMENTO</button>
                <button class="btn btn-primary">AVALIAR</button>
            </div>
        </div>
    </div>
    <div class="square">
        <div class="container">
            <div class=" d-flex itens mt-3 pt-3">
                <div>
                    <span>SARDINHA</span>
                </div>
                <div>
                    <span>10 KG</span>
                </div>
                <div>
                    <span>€ 29,00</span>
                </div>
                <div>
                    <button class="botao-prep">PREPARAÇÃO</button>
                </div>
            </div>
            <div class="mt-3 text-center " id="linha-horizontal"></div>
            <div class="d-flex mt-3 avaliar">
                <button class="btn btn-primary">INFORMAR RECEBIMENTO</button>
                <button class="btn btn-primary">AVALIAR</button>
            </div>
        </div>
    </div>
    <div class="square">
        <div class="container">
            <div class=" d-flex itens mt-3 pt-3">
                <div>
                    <span>POLVO</span>
                </div>
                <div>
                    <span>01 UNIT</span>
                </div>
                <div>
                    <span>€ 60,00</span>
                </div>
                <div>
                    <button class="botao-entr">ENTREGUE</button>
                </div>
            </div>
            <div class="mt-3 text-center " id="linha-horizontal"></div>
            <div class="d-flex mt-3 avaliar">
                <button class="btn btn-primary">INFORMAR RECEBIMENTO</button>
                <button class="btn btn-primary">AVALIAR</button>
            </div>
        </div>
    </div>
    <div class="square">
        <div class="container">
            <div class=" itens mt-3 pt-3 text-start">
                <span>Local de Entrega</span>
                <div>
                    <span>Endereço: Av. da República 1239,<br> 4430-204 Vila Nova de Gaia</span>
                </div>
            </div>
        </div>
    </div>

@endsection
