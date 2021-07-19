@extends('layouts.app-pescador')

@section('content')


<div class="header">
      <div class="container">
            <div class="py-4 text-center">
                  <img class="img-fluid " src="{{ url('app-comercial/img/logo-img.svg') }}" alt="">
            </div>
      </div>
</div>
<div>
      <div class="d-flex justify-content-between container voltar py-4 mb-5">
            <div>
                  <a href="javascript:history.back()"> <i class="fas fa-chevron-left"></i> Voltar</a>
            </div>
            <div>
                  <span>CADASTRO DE PEIXE</span>
            </div>
      </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
      <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
      </ul>
</div>
@endif

<div class="container login-py">
      <form action="{{ route('pescador.produto.store') }}" method="POST">
            @csrf
            <div class="mt-3">
                  <div class="form-group input-material">
                        <select class="form-control" name="especie_id" id="margem">
                              <option>Escolha a Espécie</option>
                              @foreach ($especies as $especie)
                              <option value="{{ $especie->id }}" data-margem="{{ $especie->margem }}">{{ $especie->nome_portugues }}</option>
                              @endforeach

                        </select>
                  </div>

                  <div class="form-group input-material">

                        <select class="form-control" name="porto_id" id="exampleFormControlSelect1">
                              <option>Escolha o Porto de descarga</option>
                              @foreach ($portos as $porto)
                              <option value="{{ $porto->id }}">{{ $porto->nome }}</option>
                              @endforeach

                        </select>
                  </div>

                  <div class="form-group input-material">
                        <select class="form-control" name="embarcacao" id="exampleFormControlSelect1">
                              <option>Escolha a Embarcação</option>

                              <option value="{{ auth()->user()->nome_embarcacao }}">
                                    {{ auth()->user()->nome_embarcacao }}</option>
                              <option value="{{ auth()->user()->nome_embarcacao2 }}">
                                    {{ auth()->user()->nome_embarcacao2 }}</option>
                              <option value="{{ auth()->user()->nome_embarcacao3 }}">
                                    {{ auth()->user()->nome_embarcacao3 }}</option>


                        </select>
                  </div>
                  <div class="form-group input-material">
                        <input type="text" class="form-control" name="zona">
                        <label for="name-field">Zona de Pesca</label>
                  </div>
                  <div class="form-group input-material">
                        <select class="form-control" name="tamanho" id="exampleFormControlSelect1">
                              <option>Escolha o Tamanho</option>
                              <option value="tamanho1">Tamanho 1 (T1)</option>
                              <option value="tamanho2">Tamanho 2 (T2)</option>
                              <option value="tamanho3">Tamanho 3 (T3)</option>
                              <option value="tamanho4">Tamanho 4 (T4)</option>
                              <option value="pequeno">Pequeno</option>
                              <option value="medio">Médio</option>
                              <option value="grande">Grande</option>
                        </select>
                  </div>
                  <div class="form-group input-material">
                        <select class="form-control" name="arte" id="exampleFormControlSelect1">
                              <option>Escolha a Arte</option>
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
                  <div class="row">
                        <div class="form-group col-6 input-material">
                              <label for="name-field">Kg</label>
                              <input id="check_kg" class="form-control" value="Kg" name="unidade" type="radio">
                        </div>
                        <div class="form-group col-6 input-material">
                              <label for="name-field">Unidade</label>
                              <input id="check_unidade" value="Unidade" class="form-control" name="unidade" type="radio">
                        </div>
                  </div>

                  <div id="kg" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="quantidade_kg">
                        <label for="name-field">Quantos Kg</label>
                  </div>

                  <div id="unidade" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="quantidade_unidade">
                        <label for="name-field">Quantos peixes tem</label>
                  </div>
                  <div id="kg_total" class="form-group d-none input-material">
                        <input type="number" class="form-control" name="total_kg">
                        <label for="name-field">Total de Kg</label>
                  </div>
                  <div id="price_div" class="form-group d-none input-material">
                        <input type="number" id="price" class="form-control" onkeyup="getPriceValue()" name="preco">
                        <label for="name-field">Preço por KG</label>
                  </div>
                  <div class="receber">

                        <input id="percent" disabled placeholder="Vai Receber" type="text" value="">
                  </div>
            </div>
            <div class="btn-box py-4"><button class="btn btn-submit" type="submit">Iniciar venda</button>

            </div>

</div>
</form>

</div>
<script>
      function getPriceValue()
            {
            var input1 = $("#price").val();
            var margem = $("#margem").find(":selected").data("margem");
            // var margem = $("#margem");
            console.log(margem);
            var valor = 0;
            var value = input1 - input1 * (margem/100);
            var input2 = $("#percent").val("Vai receber"+" "+value.toFixed(2));
            }
</script>
@endsection
