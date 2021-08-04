@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top_1">
        <div class="nome-porto">
            <h1>REVISAR PEDIDOS</h1>
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="javascript:history.back()">VOLTAR</a>
    </div>
    <div class="container">
        <div class="mt-5 mb-5 text-center">
            <div>
                <h2 class="titulo">MORADA ATUAL</h2>
            </div>
            <div class="endereco">
                <p>{{ $adresses->morada }}, {{ $adresses->codigo_postal }}, {{ $adresses->distrito }}</p>
                <div class="mt-3">
                    <button class="btn btn-editar-morada">EDITAR MORADA</button>
                </div>
            </div>
        </div>
        <div>
            <h2 class="titulo">ITENS</h2>
        </div>
    </div>
    @forelse (Cart::getContent() as $item)
        @php
            $quantity = $item->quantity;
        @endphp
            @php
            $qty = substr($quantity, 0, -1);
            $caixaDiv = $qty / 3;
            $ceil = ceil($caixaDiv);
        @endphp
        <div class="top_2 mt-3">
            <div class="container">
                <div class="products-list">
                    <div class="d-flex itens">
                        <p>item:</p>
                        <span> {{ $item->id }}</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Espécie:</p>
                        <span>{{ $item->name }}</span>
                    </div>

                    <div class="d-flex itens">
                        <p>Peso:</p>
                        <span>{{ $item->quantity }}KG</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Quantidade:</p>
                        <span>{{ $item->quantity }}</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Caixas:</p>
                        <span>{{  $qty  }}</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Valor:</p>
                        <span>{{ '€ ' . number_format($item->price, 2, ',', '.') }}</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Origem:</p>
                        <span>{{ $item->attributes->embarcacao }}</span>
                    </div>
                    <div class="d-flex itens">
                        <p>Taxa de entrega:</p>
                        <span>€ 5,00</span>
                    </div>
                </div>
                <div>
                  <a href="{{ route('store.cart.remove', $item->id) }}"> <button class="btn btn-danger btn-lg">REMOVER</button></a>
                </div>
            </div>
        </div>

    @empty
        <h3>Carrinho Vazinho!</h3>
    @endforelse


    <div class="container">
        <h2 class="titulo">TAXA DE ENTREGA TOTAL</h2>
    </div>
    <div class="top_3">
        <div class="container">
            <div class="total-price">
                <div class="euros">
                    <h1> {{ '€ ' . number_format($shipping->value, 2, ',', '.') }}</h1>
                </div>
                <div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        COMO FUNCIONA?
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">COMO FUNCIONA</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, at obcaecati amet
                                    nesciunt itaque excepturi reprehenderit consequatur id. Eos amet nostrum pariatur non
                                    cum architecto neque aut maiores vitae iste!
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">FECHAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="titulo">FORMA DE PAGAMENTO</h2>
    </div>

    <div class="top_4">
        <div class="container">
            <div class="metodos">
                <div class="logo-metodos">
                    <img src="{{ url('front-app/store/assets/img/banco.png') }}" alt="">
                </div>
                <div class="nome-metodos">
                    <label for="banco">Transferência</label>
                </div>
                <div class="form-check check">
                    <input id="banco" class="form-check-input" type="radio" name="escolha">
                </div>
            </div>
        </div>
    </div>
    <div class="top_4">
        <div class="container">
            <div class="metodos">
                <div class="logo-metodos">
                    <img src="{{ url('front-app/store/assets/img/card.png') }}" alt="">
                </div>
                <div class="nome-metodos">
                    <label for="debito">Cartão de débito ou Crédito</label>
                </div>
                <div class="form-check check">
                    <input id="debito" class="form-check-input" type="radio" name="escolha">
                </div>
            </div>
        </div>
    </div>
    <div class="top_4">
        <div class="container">
            <div class="metodos">
                <div class="logo-metodos">
                    <img src="{{ url('front-app/store/assets/img/mbred.png') }}" alt="">
                </div>
                <div class="nome-metodos">
                    <label for="mbway">MB Way</label>
                </div>
                <div class="form-check check">
                    <input id="mbway" class="form-check-input" type="radio" name="escolha">
                </div>
            </div>
        </div>
    </div>
    <div class="top_4">
        <div class="container">
            <div class="metodos">
                <div class="logo-metodos">
                    <img for="multibanco" src="{{ url('front-app/store/assets/img/mb.png') }}" alt="">
                </div>
                <div class="nome-metodos">
                    <label for="multibanco">Multibanco</label>
                </div>
                <div class="form-check check">
                    <input id="multibanco" class="form-check-input" type="radio" name="escolha">
                </div>
            </div>
        </div>
    </div>

    </div>
    <div class="container">
        <div class="termos">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"> Termos e condições</label>
            </div>
        </div>
    </div>
    <div class="total">
        <div class="container">
            <div class="itens">
                <div>
                    <span>itens ({{ Cart::getTotalQuantity() }})</span>
                </div>
                <div>
                    <span>{{ '€ ' . number_format(Cart::getTotal() + ($shipping->value * $ceil), 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
        <div class="finalizar">
            <button class="btn" type="submit">PAGAR E CONCLUIR</button>
        </div>
    </div>
@endsection
