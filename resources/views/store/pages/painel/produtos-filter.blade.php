@extends('layouts.app-store')


@section('content')

    <div class="header">
        <div class="container">
            <div class="d-flex top mt-3 justify-content-around">
                <div class="porto-nome">
                    <h3>Resultado</h3>
                </div>
                <div class="">
                    <a href="/store-porto" class="btn btn-info">TROCAR</a>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-around">
            <div>
                <span></span>
            </div>

            <div class="accordion filtro-btn mt-3">
                <div>
                    <button class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">FILTRAR</button>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="collapse" id="collapseExample">
                        <form action="{{ route('store.produto.buscar') }}" method="get">
                            @csrf
                            <div class="form-group">
                                <select name="especie_id" class="form-control" id="">
                                    <option value="">Espécie</option>
                                    @foreach ($especies as $especie)
                                    <option value="{{ $especie->id }}">{{ $especie->nome_portugues }}</option>
                                    @endforeach
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="tamanho" class="form-control" id="">
                                    <option value="">Tamanho</option>
                                    <option value="tamanho1">Tamanho 1 (T1)</option>
                                    <option value="tamanho2">Tamanho 2 (T2)</option>
                                    <option value="tamanho3">Tamanho 3 (T3)</option>
                                    <option value="tamanho4">Tamanho 4 (T4)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="arte" class="form-control" id="">
                                    <option value="">Arte</option>
                                    <option value="rede">Rede</option>
                                    <option value="vara">Vara</option>
                                    <option value="cerco">Cerco</option>
                                    <option value="arrasto">Arrasto</option>
                                    <option value="redes_de_emalhar">Redes de emalhar</option>
                                    <option value="redes_de_tresmalho">Redes de Tresmalho</option>
                                    <option value="anzol">Anzol</option>
                                    <option value="armadilhas">Armadilhas</option>
                                    <option value="envolventes_arrastantes">Envolventes arrastantes</option>
                                    <option value="arte_xavega">Arte Xávega</option>
                                    <option value="apanha">Apanha</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Buscar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="portos produtos mt-4">
            <div class="row">
                @foreach ($produtos as $produto)
                    @if ($produto->quantidade_kg >= 10)
                        <div class="col-6 my-4">
                            <a href="{{ route('store.produto.single', $produto->id) }}">
                                <img src="{{ url('storage/especies/' . $produto->especies->image) }}" alt="">
                                <p>{{ $produto->especies->nome_portugues }}</p>
                                <p id="clock"
                                    data-countdown="{{ date('Y-m-d H:i:s', strtotime('+1 days', strtotime($produto->created_at))) }}">
                                </p>

                                <p class="unid">{{ '€ ' . number_format($produto->preco, 2, ',', '.') }} - Kg</p>
                                <p>STOCK - {{ $produto->quantidade_kg }} Kg</p>
                            </a>
                        </div>
                    @endif
                @endforeach



            </div>
        </div>
    </div>

    <a href="{{ route('store.checkout.adress') }}">
        <div class="bottom">
            <div class="d-flex justify-content-around">
                <div>
                    <h5>Itens ({{ Cart::getTotalQuantity() }})</h5>
                </div>
                <div>
                    <h5>{{ '€ ' . number_format(Cart::getSubTotal(), 2, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </a>
@endsection
