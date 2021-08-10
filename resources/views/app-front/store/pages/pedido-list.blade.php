@extends('layouts.front-app.store.shop')

@section('content')
    {{-- Codigo do pedido --}}
    <div class="section-1">
        <div class="numero-pedido text-black">
            <h3>{{ $user_order->sigla }}</h3>
        </div>
        <div class="botao-voltar text-center">
            <a href="{{ route('user.pedidos') }}"><button class="btn btn-voltar btn-lg">VOLTAR</button></a>
        </div>
    </div>
    {{-- endereço de entrega --}}
    <div class="section-2">
        <div class="container">
            <div class="entrega">
                <h4>MORADA DE ENTREGA</h4>
            </div>
            <div class="morada">
                <p>{{ $user_order->enderecos->morada }} {{ $user_order->enderecos->porta }},
                    {{ $user_order->enderecos->codigo_postal }} {{ $user_order->enderecos->distrito }}</p>
            </div>
        </div>
    </div>
    {{-- lista de itens e status --}}
    @foreach ($orders as $order)
        <div class="section-3 ">
            <div class="container">
                <div class="list-item">

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Item</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->item }}</span>
                        </div>
                    </div>

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Espécie:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->name }}</span>
                        </div>
                    </div>



                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Peso:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->quantity }} kg</span>
                        </div>
                    </div>

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Quantidade:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->quantity }}</span>
                        </div>
                    </div>

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Caixas:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->caixas }}</span>
                        </div>
                    </div>

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Valor:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ '€ ' . number_format($order->products->price, 2, ',', '.') }}</span>
                        </div>
                    </div>

                    <div class="item d-flex">
                        <div class="pergunta">
                            <span>Origem:</span>
                        </div>
                        <div class="resposta">
                            <span>{{ $order->products->origem }}</span>
                        </div>
                    </div>

                    <div>
                        <div class="wait">
                            <span class="btn wait-paying">
                                @if ($order->products->status == 0) AGUARDANDO PAGAMENTO
                                @elseif($order->products->status == 1) EM PREPARAÇÃO
                                @elseif($order->products->status == 2) TRANSPORTE
                                @elseif($order->products->status == 3) ENTREGUE
                                @elseif($order->products->status == 4) CANCELADO
                                @endif
                            </span>
                        </div>
                        {{-- STATUS DE PAGAMENTOS
                        <div class="wait">
                        <span class="btn wait-paying">EM PREPARAÇÃO</span>
                    </div>
                    <div class="wait">
                        <span class="btn wait-paying">SAIU PARA ENTREGA</span>
                    </div> --}}
                        <div class="info-receber">
                            <!-- Button trigger modal -->
                            <button type="button" data-mod="{{ $order->products->id }}" id="modalEnt" class="btn info-recebeu"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                INFORMAR RECEBIMENTO
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="total-entrega">
        <div class="container">
            <div class="text-center">
                <h4>TOTAL DO PEDIDO + ENTREGA</h4>
            </div>
        </div>
    </div>
    <div class="section-4">
        <div class="container">
            <div class="preco-produtos">
                <div class="produtos-n">
                    <span>ITENS ({{ $orders->count() }})</span>
                </div>
                <div class="preco-total">
                    <span>{{ '€ ' . number_format($user_order->total, 2, ',', '.') }}</span>
                </div>
            </div>
        </div>
    </div>
    @if ($user_order->payment_mothod == 'transferencia')
        @if ($user_order->payimage)
            <div class="section-5 mb-3">
                <div class="container">
                    <h3>COMPROVANTE ENVIADO,</h3><br>
                    <h4>ACOMPANHAR O STATUS DA SUA COMPRA</h4>
                </div>
            </div>
        @else
            <div class="section-5 mb-3">
                <div class="container">
                    <div class="conta" style="font-family: Poppins;
                            font-style: normal;
                            font-weight: 500;
                            font-size: 18px;
                            line-height: 131.5%;
                            /* or 24px */
                            letter-spacing: -0.015em;

                            color: #4F3A57;">
                        <span>Conta para Transferência</span>
                        <div>
                            <span>banco Montepio - numero de conta : 295.10.005582-7 <br> BIC/SWIFT : MPIOPTPL <br> NIB :
                                0036.0295.99100055827.07 <br> IBAN: PT50.0036.0295.99100055827.07</span>
                        </div>
                    </div>
                    <form action="{{ route('pay.image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $user_order->id }}">
                        <div class="mb-3 mt-3">
                            <input name="comprovante" class="form-control form-control-lg comprovante" type="file">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-enviar">ENVIAR COMPROVANTE</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif



    @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">RECEBIMENTO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.produto.status') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <input type="hidden" name="modalId" value="">
                            <input type="hidden" name="status" value="3">
                            <div class="mt-3">
                                <span>MERCADORIA CHEGOU FRESCA?</span>
                            </div>

                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  id="inlineRadio1">
                                    <label class="form-check-label" for="inlineRadio1">SIM</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  id="inlineRadio2">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                            </div>

                            <div class="mt-3">
                                <span>ENTREGADOR FOI CORDIAL?</span>
                            </div>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  id="inlineRadio3">
                                    <label class="form-check-label" for="inlineRadio3">SIM</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  id="inlineRadio4">
                                    <label class="form-check-label" for="inlineRadio4">NÃO</label>
                                </div>
                            </div>

                            <div class="mt-3">
                                <span>AS CAIXAS FORAM DEVOLVIDAS AO ENTREGADOR?</span>
                            </div>

                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  id="inlineRadio5">
                                    <label class="form-check-label" for="inlineRadio5">SIM</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineRadio6">
                                    <label class="form-check-label" for="inlineRadio6">NÃO</label>
                                </div>
                            </div>

                            <div class="mt-3">
                                <span>QUER REGISTAR ALGUMA RECLAMAÇÃO OU ELOGIO?</span>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-recebimento" data-bs-dismiss="modal">CONFIRMAR RECEBIMENTO</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
