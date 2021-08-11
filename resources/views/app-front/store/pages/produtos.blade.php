@extends('layouts.front-app.store.shop')

@section('content')
    <div class="top_1">
        <div class="nome-porto">
            <h1>{{ $porto->nome }}</h1>
        </div>
    </div>
    <div class="botao-v">
        <a class="btn btn-voltar" href="/store-porto">TROCAR</a>
    </div>
    <div class="container">
        <div class="filtrar_1 mt-4">
            <div>
                <button class="btn btn-filtro" data-bs-toggle="modal" data-bs-target="#exampleModal">FILTRAR</button>
            </div>
        </div>
        <div class="portos mt-4 text-center">
            <div class="row my-5">
                @foreach ($produtos as $produto)

                    @if (!$produto->quantidade_unidade)
                        @if ($produto->quantidade_kg >= 10)
                            <div class="col-6 mb-5">
                                <div class="porto">
                                    <a href="{{ route('store.produto.single', $produto->id) }}"> <img
                                            src="{{ url('storage/especies/' . $produto->especies->image) }}" alt=""></a>
                                </div>
                                <div>
                                    <p>{{ $produto->especies->nome_portugues }}</p>
                                </div>
                                <div class="mt-2">
                                    <p id="clock"
                                        data-countdown="{{ date('Y-m-d H:i:s', strtotime('+1 days', strtotime($produto->created_at))) }}">
                                    </p>
                                </div>
                                <div class="valor-monetario mt-2">
                                    <span>{{ '€ ' . number_format($produto->preco, 2, ',', '.') }} - KG</span>
                                </div>
                                <div class="valor-kg mt-2">
                                    <span>STOCK - {{ $produto->quantidade_kg }} KG</span>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-6 mb-5">
                            <div class="porto">
                                <a href="{{ route('store.produto.single', $produto->id) }}"> <img
                                        src="{{ url('storage/especies/' . $produto->especies->image) }}" alt=""></a>
                            </div>
                            <div>
                                <p>{{ $produto->especies->nome_portugues }}</p>
                            </div>
                            <div class="mt-2">
                                <p id="clock"
                                    data-countdown="{{ date('Y-m-d H:i:s', strtotime('+1 days', strtotime($produto->created_at))) }}">
                                </p>
                            </div>
                            <div class="valor-monetario mt-2">
                                <span>{{ '€ ' . number_format($produto->preco, 2, ',', '.') }} - KG</span>
                            </div>
                            <div class="valor-kg mt-2">
                                <span>STOCK - {{ $produto->quantidade_kg }} KG</span>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
        @component('components.btn-comprar.btn-compra')

        @endcomponent

        @component('components.modal.filtro-modal', ['title' => 'Buscar Produto'])
            <form action="{{ route('store.produto.buscar') }}" method="get">
                @csrf
                <div class="mb-3">
                    <select name="especie_id" class="form-control" id="">
                        <option value="">Espécie</option>
                        @foreach ($especies as $especie)
                            <option value="{{ $especie->id }}">{{ $especie->nome_portugues }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <select name="tamanho" class="form-control" id="">
                        <option value="">Tamanho</option>
                        <option value="tamanho1">Tamanho 1 (T1)</option>
                        <option value="tamanho2">Tamanho 2 (T2)</option>
                        <option value="tamanho3">Tamanho 3 (T3)</option>
                        <option value="tamanho4">Tamanho 4 (T4)</option>
                    </select>
                </div>
                <div class="mb-3">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-info">Buscar</button>
                </div>
            </form>
        @endcomponent
    @endsection
