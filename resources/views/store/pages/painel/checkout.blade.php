@extends('layouts.app-store')


@section('content')
    <form action="{{ route('store.checkout.payment') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="header">
            <div class="container">
                <div class="text-center d-flex justify-content-end mx-auto py-5">
                    <a href="{{ route('store.checkout.adress') }}"> <button type="button"
                            class="btn btn-voltar">VOLTAR</button></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="morada mt-4">
                <p>Sitios Salvos</p>
            </div>

                    <div class="end">
                        <div class="end-in row align-items-center justify-content-center">
                            <div class="col-2">
                                <img src="{{ url('app-store/img/icons/location.svg') }}" alt="">
                            </div>
                            <div class="col-8">
                                <h4>{{ $adresses->morada }} - {{ $adresses->distrito }}</h4>
                            </div>
                            <div class="col-2">
                                <img src="{{ url('app-store/img/icons/close.svg') }}" alt="">
                            </div>
                        </div>
                        <input type="hidden" name="adress" value="{{ $adresses->id }}">
                    </div>

        </div>
        <div class="container mt-4">
            <div class="morada text-right">
              <a href="{{ route('store.adress') }}">  <button type="button" class="btn btn-cadastrar">Alterar</button></a>
            </div>
        </div>
        <div class="mt-4">
            <div class="container">
                <div class="morada">
                    <p>TAXA DE ENTREGA</p>
                </div>
            </div>
            <div class="tax">
                <div class="container">
                    <p>
                        {{ '€ ' . number_format($shipping->value, 2, ',', '.') }}
                    </p>

                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="container">
                <div class="morada">
                    <p>FORMA DE PAGAMENTO</p>
                </div>
            </div>
            <div class="pag">
                <div class="container">
                    <div class="row pag-in">
                        <div class="col-6">
                            <p>Transferência Bancária</p>
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn btn-voltar">Alterar</button>
                        </div>
                    </div>
                    <input type="hidden" name="payment" value="Transferência Bancária">
                    <input type="hidden" name="shipment" value="Entrega Padrão">

                </div>
            </div>

        </div>

        <div class="mt-4">
            <div class="container">
                <div class="morada">

                    <p>ITENS</p>
                </div>
            </div>
            <div class="title-back">
                <div class="container">
                    <div class="row title-check">
                        <div class="col-3">
                            <h4>ESPÉCIME</h4>
                        </div>
                        <div class="col-2">
                            <h4>QUANT</h4>
                        </div>
                        <div class="col-2">
                            <h4>VALOR</h4>
                        </div>
                        <div class="col-3">
                            <h4>EMBARCAÇÃO</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="status">
                <div class="container">
                    @forelse (Cart::getContent() as $item)
                        @php
                            $quantity = $item->quantity;
                        @endphp
                        <div class="d-flex mt-5 status-in">
                            <div class="item text-uppercase row">

                                <div class="col-4">
                                    <p>{{ $item->name }}</p>
                                </div>
                                <div class="col-2">
                                    <p>{{ $item->quantity }} KG</p>
                                </div>
                                <div class="col-2">
                                    <p>{{ '€ ' . number_format($item->price, 2, ',', '.') }}</p>
                                </div>

                                <div class="col-4 d-flex flex-column">
                                    <button type="button" class="btn btn-status0 mb-2">{{ $item->attributes->embarcacao }}</button>
                                    <a href="{{ route('store.cart.remove', $item->id) }}"> <button type="button"
                                            class="btn btn-status0 bg-danger mt-4">REMOVER</button></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3>Carrinho Vazinho!</h3>
                    @endforelse

                </div>
            </div>
        </div>
        </div>
        <div class="finalizar">
            <div class="container">
                <div class="py-4">
                    @php
                        $qty = substr($quantity, 0, -1);
                        $caixaDiv = $qty / 3;
                        $ceil = ceil($caixaDiv);
                    @endphp
                    <p>Subtotal: {{ '€ ' . number_format(Cart::getSubTotal(), 2, ',', '.') }}</p>
                    <p>Numero de Caixas: {{  $qty  }}</p>
                    <p>Taxa de Entrega:  {{ '€ ' . number_format($shipping->value * $ceil, 2, ',', '.') }} </p>
                    <h3>Total: {{ '€ ' . number_format(Cart::getTotal() + ($shipping->value * $ceil), 2, ',', '.') }}</h3>
                </div>
                <input type="hidden" name="freteval" value="{{ $shipping->value * $ceil }}">
                <input type="hidden" name="totalval" value="{{ Cart::getTotal() + ($shipping->value * $ceil) }}">
            </div>
        </div>
            <div class="text-center my-4 bg-light py-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="sim" required>
                    <label class="form-check-label" for="defaultCheck1">
                    <a data-toggle="modal"  data-target="#exampleModal"> TERMOS E CONDIÇÕES</a>
                    </label>
                  </div>
            </div>
            <div class="container my-4">
                <div class="text-right">
                    <button type="submit" class="btn btn-voltar mx-auto">FINALIZAR</button>
                </div>
            </div>
    </form>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <style>
                     ol {
                margin: 0;
                padding: 0;
            }
            table td,
            table th {
                padding: 0;
            }
            .c26 {
                border-right-style: solid;
                padding: 0pt 5.4pt 0pt 5.4pt;
                border-bottom-color: #000000;
                border-top-width: 1pt;
                border-right-width: 1pt;
                border-left-color: #000000;
                vertical-align: top;
                border-right-color: #000000;
                border-left-width: 1pt;
                border-top-style: solid;
                border-left-style: solid;
                border-bottom-width: 1pt;
                width: 248.3pt;
                border-top-color: #000000;
                border-bottom-style: solid;
            }
            .c18 {
                border-right-style: solid;
                padding: 0pt 5.4pt 0pt 5.4pt;
                border-bottom-color: #000000;
                border-top-width: 1pt;
                border-right-width: 1pt;
                border-left-color: #000000;
                vertical-align: top;
                border-right-color: #000000;
                border-left-width: 1pt;
                border-top-style: solid;
                border-left-style: solid;
                border-bottom-width: 1pt;
                width: 182.3pt;
                border-top-color: #000000;
                border-bottom-style: solid;
            }
            .c32 {
                border-right-style: solid;
                padding: 0pt 5.4pt 0pt 5.4pt;
                border-bottom-color: #000000;
                border-top-width: 1pt;
                border-right-width: 1pt;
                border-left-color: #000000;
                vertical-align: top;
                border-right-color: #000000;
                border-left-width: 1pt;
                border-top-style: solid;
                border-left-style: solid;
                border-bottom-width: 1pt;
                width: 430.7pt;
                border-top-color: #000000;
                border-bottom-style: solid;
            }
            .c1 {
                margin-left: 36pt;
                padding-top: 0pt;
                padding-left: 0pt;
                padding-bottom: 0pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c4 {
                -webkit-text-decoration-skip: none;
                color: #1155cc;
                font-weight: 400;
                text-decoration: underline;
                text-decoration-skip-ink: none;
                font-size: 11pt;
                font-family: "Times New Roman";
            }
            .c13 {
                padding-top: 0pt;
                padding-bottom: 14pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
                height: 11pt;
            }
            .c17 {
                padding-top: 0pt;
                padding-bottom: 0pt;
                line-height: 1.15;
                orphans: 2;
                widows: 2;
                text-align: left;
                height: 11pt;
            }
            .c35 {
                padding-top: 18pt;
                padding-bottom: 4pt;
                line-height: 1.1500000000000001;
                page-break-after: avoid;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c0 {
                color: #000000;
                font-weight: 400;
                text-decoration: none;
                vertical-align: baseline;
                font-size: 12pt;
                font-family: "Times New Roman";
                font-style: normal;
            }
            .c6 {
                padding-top: 0pt;
                padding-bottom: 10pt;
                line-height: 1.1500000000000001;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c41 {
                padding-top: 14pt;
                padding-bottom: 8pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c19 {
                -webkit-text-decoration-skip: none;
                color: #1155cc;
                font-weight: 400;
                text-decoration: underline;
                text-decoration-skip-ink: none;
                font-family: "Times New Roman";
            }
            .c44 {
                padding-top: 14pt;
                padding-bottom: 13.5pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: center;
            }
            .c3 {
                padding-top: 14pt;
                padding-bottom: 14pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c23 {
                padding-top: 0pt;
                padding-bottom: 14pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c20 {
                padding-top: 14pt;
                padding-bottom: 0pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c30 {
                padding-top: 0pt;
                padding-bottom: 10pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c42 {
                padding-top: 0pt;
                padding-bottom: 14pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: center;
            }
            .c31 {
                padding-top: 14pt;
                padding-bottom: 10pt;
                line-height: 1;
                orphans: 2;
                widows: 2;
                text-align: left;
            }
            .c9 {
                font-size: 12pt;
                font-family: "Times New Roman";
                font-style: italic;
                font-weight: 400;
            }
            .c16 {
                margin-left: -5.2pt;
                border-spacing: 0;
                border-collapse: collapse;
                margin-right: auto;
            }
            .c36 {
                -webkit-text-decoration-skip: none;
                color: #1155cc;
                text-decoration: underline;
                text-decoration-skip-ink: none;
            }
            .c37 {
                -webkit-text-decoration-skip: none;
                color: #0000ff;
                text-decoration: underline;
                text-decoration-skip-ink: none;
            }
            .c40 {
                padding-top: 0pt;
                padding-bottom: 0pt;
                line-height: 1.15;
                text-align: left;
            }
            .c7 {
                color: #000000;
                text-decoration: none;
                vertical-align: baseline;
                font-style: normal;
            }
            .c2 {
                font-size: 12pt;
                font-family: "Times New Roman";
                font-weight: 700;
            }
            .c8 {
                font-weight: 400;
                font-size: 11pt;
                font-family: "Calibri";
            }
            .c15 {
                font-size: 12pt;
                font-family: "Times New Roman";
                font-weight: 400;
            }
            .c25 {
                font-weight: 700;
                font-size: 13.5pt;
                font-family: "Times New Roman";
            }
            .c24 {
                font-weight: 700;
                font-size: 18pt;
                font-family: "Times New Roman";
            }
            .c43 {
                font-weight: 700;
                font-family: "Times New Roman";
            }
            .c12 {
                padding: 0;
                margin: 0;
            }
            .c21 {
                color: inherit;
                text-decoration: inherit;
            }
            .c39 {
                max-width: 451.4pt;
                padding: 72pt 72pt 72pt 72pt;
            }
            .c5 {
                margin-left: 36pt;
                padding-left: 0pt;
            }
            .c33 {
                font-weight: 400;
                font-family: "Times New Roman";
            }
            .c10 {
                font-weight: 400;
                font-family: "Calibri";
            }
            .c11 {
                font-weight: 700;
                font-family: "Calibri";
            }
            .c29 {
                font-weight: 400;
                font-family: "Arial";
            }
            .c28 {
                font-size: 11pt;
            }
            .c27 {
                height: 0pt;
            }
            .c22 {
                height: 11pt;
            }
            .c38 {
                font-size: 13pt;
            }
            .c34 {
                background-color: #ffffff;
            }
            .c14 {
                font-style: italic;
            }
                </style>
                <p class="c23"><span class="c7 c24">POL&Iacute;TICAS</span></p>
                <p class="c13"><span class="c7 c24"></span></p>
                <p class="c13"><span class="c7 c24"></span></p>
                <p class="c23"><span class="c7 c24">Termos e Condi&ccedil;&otilde;es</span></p>
                <p class="c3"><span class="c7 c2">1. Titularidade do Website e App&rsquo;s</span></p>
                <p class="c3"><span class="c0">O Website e App&rsquo;s s&atilde;o propriedade da KARAPAU.TECH, SA, pessoa colectiva, com sede em Rua C&acirc;ndido dos Reis, 137 4400-073 VILA NOVA DE GAIA , NIF 516436481 &nbsp;</span></p>
                <p class="c3"><span class="c7 c2">2. Objeto e &Acirc;mbito</span></p>
                <p class="c3">
                    <span class="c15">
                        Os presentes termos e condi&ccedil;&otilde;es (doravante conjuntamente designados por &ldquo;Condi&ccedil;&otilde;es&rdquo;) estabelecem as regras para o acesso e utiliza&ccedil;&atilde;o do s&iacute;tio de internet da
                        KARAPAU.TECH, SA (doravante designada KARAPAU.TECH)
                    </span>
                    <span class="c33">&nbsp;</span>
                    <span class="c19"><a class="c21" href="https://www.google.com/url?q=http://www.karapau.pt&amp;sa=D&amp;source=editors&amp;ust=1626269912162000&amp;usg=AOvVaw2T4xmSUNLOTjR5wENT1baL">www.karapau.pt</a></span>
                    <span class="c33">&nbsp;</span>
                    <span class="c0">
                        , bem como das aplica&ccedil;&otilde;es desta entidade desenvolvidas para dispositivos m&oacute;veis (doravante designado por &ldquo;Website&rdquo; e &ldquo;App&rsquo;s&rdquo;) &nbsp;pelo que a utiliza&ccedil;&atilde;o deste
                        pressup&otilde;e a aceita&ccedil;&atilde;o e o cumprimento dos termos abaixo descritos.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH reserva o direito de alterar, aditar ou suprimir as Condi&ccedil;&otilde;es, sem aviso pr&eacute;vio, produzindo as referidas altera&ccedil;&otilde;es os seus efeitos, ap&oacute;s a
                        disponibiliza&ccedil;&atilde;o das mesmas no Website e App&rsquo;s.
                    </span>
                </p>
                <p class="c3"><span class="c0">A KARAPAU.TECH reserva o direito de modificar, a qualquer momento, a informa&ccedil;&atilde;o e oferta comercial apresentada. </span></p>
                <p class="c3"><span class="c2 c7">3. Condi&ccedil;&otilde;es Gerais</span></p>
                <p class="c3"><span class="c0">Na utiliza&ccedil;&atilde;o do Website e App&rsquo;s, o utilizador obriga-se, designadamente, a:</span></p>
                <p class="c3"><span class="c0">a) Respeitar os direitos de autor e de propriedade intelectual da KARAPAU.TECH;</span></p>
                <p class="c3">
                    <span class="c0">
                        b) Fazer uma correta e adequada utiliza&ccedil;&atilde;o do Website e App&rsquo;s e dos seus conte&uacute;dos, de acordo com as presentes termos e condi&ccedil;&otilde;es, que declara expressamente ter lido, compreendido e
                        aceitado na &iacute;ntegra;
                    </span>
                </p>
                <p class="c3"><span class="c0">c) N&atilde;o modificar o software do Website e App&rsquo;s, com o objetivo de obter acesso n&atilde;o autorizado a quaisquer dos seus conte&uacute;dos.</span></p>
                <p class="c3">
                    <span class="c0">
                        O Website e App&rsquo;s cont&ecirc;m textos, informa&ccedil;&otilde;es, fotografias, artigos informativos, ilustra&ccedil;&otilde;es, software, &aacute;udio e v&iacute;deo (os quais ser&atilde;o designados por &ldquo;
                        Conte&uacute;dos&rdquo;) que apenas ser&atilde;o acess&iacute;veis mediante a aceita&ccedil;&atilde;o, sem quaisquer reservas, das presentes Condi&ccedil;&otilde;es.
                    </span>
                </p>
                <p class="c3"><span class="c7 c2">4. Conte&uacute;dos</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH autoriza os utilizadores do Website e App&rsquo;s a aceder e utilizar os Conte&uacute;dos deste, para fins exclusivamente pessoais, bem como os autoriza a criar links para o Website e App&rsquo;s, sem que para
                        tanto seja necess&aacute;rio o consentimento expresso da KARAPAU.TECH, porquanto aqueles links d&ecirc;em origem &agrave; abertura de uma nova janela do browser, atrav&eacute;s da qual a liga&ccedil;&atilde;o ao Website e
                        App&rsquo;s seja indicada explicitamente, evitando, desta forma, a confus&atilde;o entre o Website e App&rsquo;s e os s&iacute;tios eletr&oacute;nicos dos utilizadores.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A reprodu&ccedil;&atilde;o, transfer&ecirc;ncia, distribui&ccedil;&atilde;o ou armazenamento dos Conte&uacute;dos, pelos utilizadores, para quaisquer fins que n&atilde;o sejam estritamente pessoais, nomeadamente comerciais,
                        sem a autoriza&ccedil;&atilde;o pr&eacute;via escrita da KARAPAU.TECH, encontra-se expressamente proibida.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Est&aacute;, estritamente, proibida qualquer modifica&ccedil;&atilde;o, c&oacute;pia, distribui&ccedil;&atilde;o, transmiss&atilde;o, publica&ccedil;&atilde;o, licen&ccedil;a ou cria&ccedil;&atilde;o de novos
                        conte&uacute;dos, independentemente da sua natureza e dos seus fins que integrem, parcial ou totalmente os Conte&uacute;dos do Website e App&rsquo;s, sem autoriza&ccedil;&atilde;o pr&eacute;via escrita da KARAPAU.TECH.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Ressalva-se a possibilidade de a KARAPAU.TECH, a qualquer momento e sem necessidade de aviso pr&eacute;vio, vir a alterar, suspender ou descontinuar quaisquer Conte&uacute;dos, designadamente os produtos, sem que dessa
                        modifica&ccedil;&atilde;o decorra qualquer obriga&ccedil;&atilde;o de indemnizar quaisquer terceiros. Quaisquer altera&ccedil;&otilde;es aos Conte&uacute;dos produzir&atilde;o os seus efeitos ap&oacute;s a sua
                        disponibiliza&ccedil;&atilde;o do Website e App&rsquo;s.
                    </span>
                </p>
                <p class="c3"><span class="c7 c2">5. Propriedade Intelectual e Propriedade Industrial</span></p>
                <p class="c3"><span class="c0">Todos os direitos de autor e de propriedade intelectual sobre os Conte&uacute;dos e o Website e App&rsquo;s pertencem &agrave; KARAPAU.TECH.</span></p>
                <p class="c3">
                    <span class="c0">
                        As denomina&ccedil;&otilde;es sociais, marcas e sinais distintivos reproduzidos no Website e App&rsquo;s est&atilde;o protegidos nos termos das disposi&ccedil;&otilde;es legais aplic&aacute;veis &agrave; propriedade
                        industrial. A reprodu&ccedil;&atilde;o ou representa&ccedil;&atilde;o de todo ou parte de quaisquer sinais distintivos &eacute; estritamente proibida e deve ser objeto de uma autoriza&ccedil;&atilde;o escrita pr&eacute;via
                        da KARAPAU.TECH ou do titular da marca exibida no Website e App&rsquo;s.
                    </span>
                </p>
                <p class="c3"><span class="c7 c2">6. Newsletters</span></p>
                <p class="c3"><span class="c0">O Website e App&rsquo;s disponibiliza ao utilizador a possibilidade de subscrever gratuitamente as newsletters da KARAPAU.TECH. </span></p>
                <p class="c3">
                    <span class="c0">
                        As newsletters KARAPAU.TECH, enviadas com diferentes periodicidades, cont&ecirc;m conte&uacute;do informativo e promocional, selecionado pela KARAPAU.TECH, a respeito das solu&ccedil;&otilde;es apresentadas em diferentes
                        &aacute;reas.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Ao utilizador assiste o direito de, a qualquer momento, cancelar o servi&ccedil;o de subscri&ccedil;&atilde;o e envio de newsletters pela KARAPAU.TECH, quer atrav&eacute;s do bot&atilde;o de ac&ccedil;&atilde;o sempre
                        dispon&iacute;vel no rodap&eacute; das publica&ccedil;&otilde;es, quer atrav&eacute;s do envio de um email para dados.pessoais@gsc.pt.
                    </span>
                </p>
                <p class="c3" id="h.gjdgxs">
                    <span class="c0">
                        Ao submeter o pedido de subscri&ccedil;&atilde;o de newsletters, o utilizadores aceita e reconhece ter lido os Termos e Condi&ccedil;&otilde;es do Website e App&rsquo;s, e aceita igualmente que o envio de newsletters pela
                        KARAPAU.TECH ter&aacute; lugar at&eacute; que se d&ecirc; o cancelamento do servi&ccedil;o.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A aceita&ccedil;&atilde;o das presentes condi&ccedil;&otilde;es &eacute; obrigat&oacute;ria, sem reservas, e tem car&aacute;ter vinculativo, pelo que somente mediante a sua expressa aceita&ccedil;&atilde;o poder&atilde;o os
                        utilizadores receber periodicamente as newsletters da KARAPAU.TECH.
                    </span>
                </p>
                <p class="c3"><span class="c7 c2">7. Pol&iacute;tica de Privacidade</span></p>
                <p class="c3">
                    <span class="c15">
                        A KARAPAU.TECH considera uma das suas principais preocupa&ccedil;&otilde;es a privacidade dos dados pessoais dos utilizadores do Website e App&rsquo;s e declara que cumpre todas as disposi&ccedil;&otilde;es legais
                        aplic&aacute;veis &agrave; prote&ccedil;&atilde;o e privacidade dos dados pessoais destes, designadamente as disposi&ccedil;&otilde;es constantes do
                    </span>
                    <span class="c9">Regulamento (UE) 2016/679 do Parlamento Europeu e do Conselho, de 27 de abril de 2016</span>
                    <span class="c0">, relativo &agrave; protec&ccedil;&atilde;o das pessoas singulares no que diz respeito ao tratamento de dados pessoais e &agrave; livre circula&ccedil;&atilde;o desses mesmos dados.</span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH informa os utilizadores que os dados pessoais facultados atrav&eacute;s do Website e App&rsquo;s, nomeadamente atrav&eacute;s do registo na newsletter, ser&atilde;o tratados informaticamente e
                        constituir&atilde;o um ficheiro informatizado de dados de car&aacute;cter pessoal, propriedade da KARAPAU.TECH,SA.
                    </span>
                </p>
                <p class="c3">
                    <span class="c15">
                        Sem preju&iacute;zo das informa&ccedil;&otilde;es e dados recolhidos atrav&eacute;s da subscri&ccedil;&atilde;o da newsletter, a KARAPAU.TECH proceder&aacute;, adicionalmente, &agrave; recolha de informa&ccedil;&atilde;o
                        an&oacute;nima atrav&eacute;s do Website e App&rsquo;s, designadamente informa&ccedil;&otilde;es relativas ao tipo de
                    </span>
                    <span class="c9">browser</span><span class="c15">&nbsp;internet utilizado, sistemas operativos e data e hora de acesso ao Website e App&rsquo;s, recorrendo, para tanto a tecnologias de controlo (</span>
                    <span class="c9">cookies</span><span class="c0">) para reunir essa informa&ccedil;&atilde;o.</span>
                </p>
                <p class="c3">
                    <span class="c15">Para saber mais acerca da </span><span class="c9">Pol&iacute;tica de Recolha Processamento e Tratamento de Dados Pessoais </span><a id="kix.c8rbxmupes05"></a><a id="kix.tefz6r7lck8o"></a>
                    <span class="c9">de Cliente ou Pessoa com este Relacionada </span><span class="c15">e da</span><span class="c9">&nbsp;Pol&iacute;tica de Cookies</span><span class="c15">&nbsp;da KARAPAU.TECH, por favor consulte as mesmas </span>
                </p>
                <p class="c3 c22"><span class="c0"></span></p>
                <p class="c41">
                    <span class="c0">
                        A KARAPAU.TECH poder&aacute;, em qualquer altura e sem necessidade de aviso pr&eacute;vio, alterar a presente pol&iacute;tica de privacidade, disponibilizando as altera&ccedil;&otilde;es introduzidas no Website e
                        App&rsquo;s, em &aacute;rea acess&iacute;vel a todos os seus utilizadores.
                    </span>
                </p>
                <p class="c17"><span class="c7 c28 c29"></span></p>
                <p class="c17"><span class="c7 c29 c28"></span></p>
                <p class="c17"><span class="c7 c29 c28"></span></p>
                <p class="c42"><span class="c7 c24">Pol&iacute;tica de Privacidade e Prote&ccedil;&atilde;o de Dados</span></p>
                <p class="c3"><span class="c9">Altera&ccedil;&atilde;o mais recente dezembro de 2019</span></p>
                <ul class="c12 lst-kix_4uhmybko5cg5-0 start">
                    <li class="c3 c5 li-bullet-0"><span class="c2">Informa&ccedil;&otilde;es B&aacute;sicas</span></li>
                </ul>
                <a id="t.7c4a1aec88e5e61fcde75eb8d3de4bb314585d6d"></a><a id="t.0"></a>
                <table class="c16">
                    <tbody>
                        <tr class="c27">
                            <td class="c32" colspan="2" rowspan="1">
                                <p class="c23"><span class="c0">Primeira Parte - Informa&ccedil;&otilde;es B&aacute;sicas de Prote&ccedil;&atilde;o de Dados</span></p>
                                <p class="c31 c22"><span class="c0"></span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Identidade Respons&aacute;vel pelo tratamento</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <p class="c23"><span class="c0 c34">karapau.tech,sa</span></p>
                                <p class="c3"><span class="c0">N&uacute;mero de Identifica&ccedil;&atilde;o de Pessoa Coletiva (NIPC): 516436481</span></p>
                                <p class="c3"><span class="c0">Rua C&acirc;ndido dos Reis 137</span></p>
                                <p class="c3"><span class="c0">4400-073 VILA NOVA DE GAIA </span></p>
                                <p class="c31 c22"><span class="c0"></span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Finalidade</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Gest&atilde;o e presta&ccedil;&atilde;o dos servi&ccedil;os solicitados</span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Legitima&ccedil;&atilde;o</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Cumprimento da rela&ccedil;&atilde;o contratual, interesse leg&iacute;timo e consentimento do Utilizador</span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Direitos</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">O direito de acesso, retificar e apagar dados, assim como outros direitos, como explicado nas informa&ccedil;&otilde;es adicionais.</span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Informa&ccedil;&otilde;es Adicionais</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <p class="c30"><span class="c0">Pode encontrar informa&ccedil;&otilde;es adicionais pormenorizadas nas sec&ccedil;&otilde;es seguintes.</span></p>
                            </td>
                        </tr>
                        <tr class="c27">
                            <td class="c18" colspan="1" rowspan="1">
                                <p class="c23"><span class="c0">Entre em contato com o respons&aacute;vel pela prote&ccedil;&atilde;o de dados.</span></p>
                                <p class="c31"><span class="c0">&nbsp;</span></p>
                            </td>
                            <td class="c26" colspan="1" rowspan="1">
                                <h2 class="c30" id="h.vivpxn96uklm"><span class="c7 c28 c43">geral@karapau.pt</span></h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="c22 c44">
                    <span class="c7 c25"><br /></span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Al&eacute;m disso, a Karapau.Tech pode partilhar os dados dos utilizadores (&ldquo;Utilizadores&rdquo;) que se registam no site ou na app (a &ldquo;Plataforma&rdquo;) e os das pessoas que contactam a Karapau.Tech usando os
                        formul&aacute;rios dispon&iacute;veis na Plataforma, com cada uma das subsidi&aacute;rias e empresas do Grupo Karapau.Tech, para efeitos de oferecerem os servi&ccedil;os solicitados atrav&eacute;s da Plataforma pelos
                        Utilizadores. <br />
                        <br />
                        A presente pol&iacute;tica de privacidade oferece informa&ccedil;&otilde;es sobre o tratamento dos dados pessoais dos nossos utilizadores, candidatos a emprego, Utilizadores das redes sociais que interagem connosco e
                        utilizadores do formul&aacute;rio de contacto no nosso site, como previsto no Regulamento Geral de Prote&ccedil;&atilde;o de Dados (&ldquo;RGPD&rdquo;).
                    </span>
                </p>
                <ul class="c12 lst-kix_cfu89m8tgd0o-0 start">
                    <li class="c3 c5 li-bullet-0"><span class="c2">Tratamento dos Dados dos Utilizadores e das Pessoas que Contactam a Karapau.Tech</span></li>
                </ul>
                <p class="c3"><span class="c2">3.1 Dados tratados</span></p>
                <ol class="c12 lst-kix_t7iv4149ofzb-0 start" start="1">
                    <li class="c3 c5 li-bullet-0"><span class="c2">a) Informa&ccedil;&otilde;es fornecidas diretamente pelos Utilizadores:</span></li>
                </ol>
                <ul class="c12 lst-kix_xa2fmek9h1tj-0 start">
                    <li class="c5 c20 li-bullet-0">
                        <span class="c9">Dados de Registo</span><span class="c0">: as informa&ccedil;&otilde;es fornecidas pelos Utilizadores quando criam uma conta na Plataforma da KARAPAU.TECH: nome de utilizador e e-mail.</span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c9">Informa&ccedil;&otilde;es do Perfil do Utilizador</span>
                        <span class="c0">
                            : as informa&ccedil;&otilde;es adicionadas na Plataforma pelos Utilizadores para poderem utilizar o servi&ccedil;o da KARAPAU.TECH; i.e., o n&uacute;mero de telem&oacute;vel e a morada de entrega. Os Utilizadores podem
                            ver e editar os dados pessoais no perfil quando o desejarem. A KARAPAU.TECH n&atilde;o conserva dados do cart&atilde;o de cr&eacute;dito, mas estes s&atilde;o fornecidos aos prestadores de servi&ccedil;os de pagamento
                            eletr&oacute;nico licenciados, que recebem diretamente os dados inclu&iacute;dos e os conservam para facilitar o processamento do pagamento dos Utilizadores e para os gerir em nome da KARAPAU.TECH. As
                            informa&ccedil;&otilde;es n&atilde;o ser&atilde;o conservadas nos servidores da KARAPAU.TECH em nenhuma circunst&acirc;ncia. Os utilizadores podem apagar em qualquer momento os dados dos cart&otilde;es de cr&eacute;dito
                            associados &agrave; respetiva conta. Isto ir&aacute; fazer com que o prestador de servi&ccedil;os apague as informa&ccedil;&otilde;es, que ter&atilde;o de ser introduzidas de novo ou selecionadas para fazer novas
                            encomendas atrav&eacute;s da Plataforma. Os Utilizadores podem solicitar a qualquer momento as pol&iacute;ticas de privacidade desses fornecedores.&nbsp;
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c9">Informa&ccedil;&otilde;es Adicionais que os Utilizadores desejem partilhar</span>
                        <span class="c0">
                            : quaisquer informa&ccedil;&otilde;es que um Utilizador possa fornecer &agrave; Karapau.Tech para outros efeitos. Os exemplos incluem uma fotografia do Utilizador ou o endere&ccedil;o de fatura&ccedil;&atilde;o no caso
                            de Utilizadores que tenham pedido para receber faturas da KARAPAU.TECH.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c9">Informa&ccedil;&otilde;es sobre comunica&ccedil;&otilde;es anteriores com a KARAPAU.TECH</span>
                        <span class="c0">
                            : A KARAPAU.TECH ter&aacute; acesso &agrave;s informa&ccedil;&otilde;es fornecidas pelos Utilizadores para a resolu&ccedil;&atilde;o de quaisquer consultas ou reclama&ccedil;&otilde;es sobre a utiliza&ccedil;&atilde;o da
                            plataforma, quer atrav&eacute;s do formul&aacute;rio de contacto, por e-mail ou por telefone atrav&eacute;s do servi&ccedil;o de apoio aos clientes.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Informa&ccedil;&otilde;es sobre acidentes que envolvam qualquer das partes envolvidas na presta&ccedil;&atilde;o de servi&ccedil;os atrav&eacute;s da Plataforma, para efeitos de declara&ccedil;&otilde;es de sinistro ou
                            para quaisquer outras a&ccedil;&otilde;es com as seguradoras contratadas pela KARAPAU.TECH.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Transcri&ccedil;&atilde;o e grava&ccedil;&atilde;o de conversas mantidas entre o UTILIZADOR e a KARAPAU.TECH para o tratamento de incidentes, quest&otilde;es ou quaisquer outras consultas que possam ser feitas.
                        </span>
                    </li>
                    <li class="c23 c5 li-bullet-0">
                        <span class="c9">Informa&ccedil;&otilde;es sobre Comunica&ccedil;&otilde;es entre Utilizadores e Mandat&aacute;rios</span>
                        <span class="c0">
                            : A KARAPAU.TECH ter&aacute; acesso &agrave;s comunica&ccedil;&otilde;es trocadas entre os Utilizadores e os Mandat&aacute;rios que colaboram com a Plataforma atrav&eacute;s do sistema de chat disponibilizado na
                            Plataforma.
                        </span>
                    </li>
                </ul>
                <ol class="c12 lst-kix_psxoj5gsvy9z-0 start" start="1">
                    <li class="c3 c5 li-bullet-0"><span class="c2">b) Informa&ccedil;&otilde;es fornecidas indiretamente pelos Utilizadores:</span></li>
                </ol>
                <p class="c3">
                    <span class="c9">-</span><span class="c15">&nbsp;</span><span class="c9">Dados resultantes da utiliza&ccedil;&atilde;o da Plataforma</span>
                    <span class="c0">: A KARAPAU.TECH recolhe os dados resultantes da Utiliza&ccedil;&atilde;o da Plataforma pelos Utilizadores sempre que estes interagem com a Plataforma.</span>
                </p>
                <p class="c3">
                    <span class="c15">- </span><span class="c9">Dados na aplica&ccedil;&atilde;o e no dispositivo</span>
                    <span class="c0">: A KARAPAU.TECH armazena dados no dispositivo e na Aplica&ccedil;&atilde;o usados pelos Utilizadores para acederem aos servi&ccedil;os. Estes dados s&atilde;o:</span>
                </p>
                <ul class="c12 lst-kix_8tv9e2ier6jb-0 start">
                    <li class="c20 c5 li-bullet-0"><span class="c0">O endere&ccedil;o de IP usado por cada Utilizador para se ligar &agrave; Internet usando o seu computador ou telem&oacute;vel.</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            As informa&ccedil;&otilde;es sobre o computador ou telem&oacute;vel dos utilizadores, tais como a liga&ccedil;&atilde;o &agrave; Internet, tipo de navegador, vers&atilde;o e sistema operativo, e tipo de dispositivo.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0"><span class="c15">O </span><span class="c9">Clickstream</span><span class="c0">&nbsp;completo do localizador-padr&atilde;o de recursos (URL), incluindo a data e hora.</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c9">Dados da conta do Utilizador:</span>
                        <span class="c0">&nbsp;informa&ccedil;&otilde;es sobre as encomendas feitas por cada Utilizador, assim como as opini&otilde;es e/ou coment&aacute;rios feitos por cada Utilizador sobre as mesmas.</span>
                    </li>
                    <li class="c23 c5 li-bullet-0"><span class="c0">O hist&oacute;rico e prefer&ecirc;ncias de navega&ccedil;&atilde;o do Utilizador.</span></li>
                </ul>
                <p class="c3">
                    <span class="c15">- </span><span class="c9">Dados resultantes da origem do Utilizador</span>
                    <span class="c0">
                        : se um Utilizador chega &agrave; Plataforma da KARAPAU.TECH atrav&eacute;s de uma fonte externa (como uma liga&ccedil;&atilde;o de outro site ou de uma rede social), a KARAPAU.TECH recolhe dados sobre a fonte a partir da
                        qual o Utilizador da KARAPAU.TECH chegou.&nbsp;
                    </span>
                </p>
                <p class="c3">
                    <span class="c15">- Dados </span><span class="c9">resultantes da gest&atilde;o de incidentes</span>
                    <span class="c0">
                        : se um Utilizador contactar a Plataforma da KARAPAU.TECH atrav&eacute;s do Formul&aacute;rio de Contacto ou do n&uacute;mero de telefone da KARAPAU.TECH, a KARAPAU.TECH ir&aacute; recolher as mensagens recebidas no formato
                        usado pelo Utilizador e pode usar e conservar essas mensagens para gerir incidentes atuais ou futuros.
                    </span>
                </p>
                <p class="c3">
                    <span class="c15">- </span><span class="c9">Dados resultantes de &ldquo;cookies&rdquo;</span><span class="c15">: A KARAPAU.TECH usa </span><span class="c9">cookies</span>
                    <span class="c0">&nbsp;pr&oacute;prios e de terceiros para facilitar a navega&ccedil;&atilde;o dos utilizadores e para fins estat&iacute;sticos.</span>
                </p>
                <p class="c3">
                    <span class="c15">- </span><span class="c9">Dados resultantes de terceiros externos:</span>
                    <span class="c0">
                        &nbsp;A KARAPAU.TECH apenas pode recolher dados pessoais ou informa&ccedil;&otilde;es de terceiros externos se o Utilizador autorizar que esses terceiros partilhem as informa&ccedil;&otilde;es com a KARAPAU.TECH. Por
                        exemplo, se um Utilizador criar uma conta atrav&eacute;s da sua conta do Facebook, o Facebook pode divulgar-nos os dados pessoais desse Utilizador que podem ser encontrados no seu perfil do Facebook (como nome, g&eacute;nero
                        ou idade).
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Do mesmo modo, se um utilizador aceder &agrave; KARAPAU.TECH atrav&eacute;s de produtos ou servi&ccedil;os oferecidos pelo Google, o Google pode enviar &agrave; KARAPAU.TECH os dados de navega&ccedil;&atilde;o do Utilizador,
                        com acesso &agrave; plataforma atrav&eacute;s das liga&ccedil;&otilde;es criadas pelo Google.
                    </span>
                </p>
                <p class="c3"><span class="c0">As informa&ccedil;&otilde;es fornecidas por terceiros externos podem ser controladas pelo Utilizador de acordo com a pol&iacute;tica de privacidade do pr&oacute;prio terceiro.</span></p>
                <p class="c3">
                    <span class="c15">- </span><span class="c9">Dados de geolocaliza&ccedil;&atilde;o:</span>
                    <span class="c0">
                        &nbsp;desde que autorizada pelos Utilizadores, a KARAPAU.TECH ir&aacute; recolher os dados relacionados com a localiza&ccedil;&atilde;o dos mesmos, incluindo a localiza&ccedil;&atilde;o geogr&aacute;fica em tempo real do
                        computador ou dispositivo m&oacute;vel.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2 Finalidade</span></p>
                <p class="c3"><span class="c2">3.2.1. Para usar a Plataforma da Karapau.Tech</span><span class="c0">&nbsp;</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH usa os dados recolhidos dos Utilizadores para lhes permitir aceder e comunicar com a plataforma da KARAPAU.TECH e para prestar os servi&ccedil;os solicitados pelos utilizadores atrav&eacute;s da respetiva
                        conta na Plataforma da KARAPAU.TECH, de acordo com o processo descrito nas &ldquo;Condi&ccedil;&otilde;es de Utiliza&ccedil;&atilde;o&rdquo;.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.2. Enviar comunica&ccedil;&otilde;es</span></p>
                <p class="c3"><span class="c0">A KARAPAU.TECH usa os dados pessoais dos Utilizadores para comunicar por e-mail e/ou para enviar mensagens SMS relacionadas com o funcionamento do servi&ccedil;o.</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH pode enviar mensagens para o telem&oacute;vel do Utilizador com informa&ccedil;&otilde;es relacionadas com o estado da encomenda solicitada. Quando a encomenda estiver conclu&iacute;da, a KARAPAU.TECH
                        enviar&aacute; um resumo/recibo da encomenda e o pre&ccedil;o da mesma para o e-mail do Utilizador.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.3. Para detetar e investigar fraudes e poss&iacute;veis infra&ccedil;&otilde;es penais</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH tamb&eacute;m utiliza as informa&ccedil;&otilde;es para investigar e analisar como melhorar os servi&ccedil;os que presta aos Utilizadores, assim como para desenvolver e melhorar as caracter&iacute;sticas do
                        servi&ccedil;o que oferece. Internamente, a KARAPAU.TECH usa as informa&ccedil;&otilde;es para fins estat&iacute;sticos para analisar o comportamento e tend&ecirc;ncias do Utilizador, para compreender a forma como os
                        Utilizadores usam a Plataforma da KARAPAU.TECH e para gerir e melhorar os servi&ccedil;os oferecidos, incluindo a possibilidade de adicionar servi&ccedil;os diferentes, novos, &agrave; Plataforma.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH pode monitorizar todas as a&ccedil;&otilde;es relacionadas com os meios de pagamento usados pelos utilizadores que podem resultar em fraude ou na perpetra&ccedil;&atilde;o de uma infra&ccedil;&atilde;o
                        penal.&nbsp; A KARAPAU.TECH pode pedir aos utilizadores uma c&oacute;pia do documento de identifica&ccedil;&atilde;o, assim como determinadas informa&ccedil;&otilde;es sobre o cart&atilde;o de cr&eacute;dito usado para fazer
                        a encomenda. Em qualquer caso, todos os dados ser&atilde;o tratados pela KARAPAU.TECH para o fim exclusivo de cumprimento das fun&ccedil;&otilde;es de preven&ccedil;&atilde;o e monitoriza&ccedil;&atilde;o de fraude, e
                        ser&atilde;o conservados durante o tempo que a rela&ccedil;&atilde;o com o utilizador estiver em vigor, e mesmo ap&oacute;s esse per&iacute;odo at&eacute; que tenha expirado o direito do utilizador de reclamar ou de
                        instaurar uma a&ccedil;&atilde;o judicial relacionada com o pagamento dos produtos ou servi&ccedil;os encomendados atrav&eacute;s da KARAPAU.TECH. Os dados relacionados com o cart&atilde;o de cr&eacute;dito usado
                        ser&atilde;o conservados at&eacute; que o incidente tenha sido resolvido e durante os 120 dias posteriores. Se forem detetadas quaisquer irregularidades na utiliza&ccedil;&atilde;o que possam ser consideradas atividades
                        ilegais, a KARAPAU.TECH reserva-se o direito de conservar os dados fornecidos e de os partilhar com as autoridades competentes para que realizem a investiga&ccedil;&atilde;o relevante. A KARAPAU.TECH pode partilhar os dados
                        com as autoridades com base na obriga&ccedil;&atilde;o legal de processar condutas que s&atilde;o contr&aacute;rias &agrave; legisla&ccedil;&atilde;o aplic&aacute;vel.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.4. Para garantir seguran&ccedil;a e um ambiente adequado para o fornecimento seguro de servi&ccedil;os.</span></p>
                <p class="c3"><span class="c0">A KARAPAU.TECH pode usar os dados para garantir a utiliza&ccedil;&atilde;o apropriada dos produtos solicitados na Plataforma.</span></p>
                <p class="c3"><span class="c2">3.2.5. Para cumprir a legisla&ccedil;&atilde;o e instaurar e para se defender de a&ccedil;&otilde;es judiciais&nbsp;</span></p>
                <p class="c3">
                    <span class="c15">2.3.- A KARAPAU.TECH informa o utilizador que as conversas com o Mandat&aacute;rio ao utilizar o sistema de </span><span class="c9">chat</span>
                    <span class="c0">
                        &nbsp;podem ser analisadas e usadas pela KARAPAU.TECH para a finalidade de apresentar e/ou contestar quaisquer reclama&ccedil;&otilde;es e/ou a&ccedil;&otilde;es judiciais que possam ser necess&aacute;rias, bem como para
                        gerir quaisquer incidentes relacionados com encomendas.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.6. Promo&ccedil;&atilde;o e ofertas comerciais (online e offline)&nbsp;</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH usa tecnologia de terceiros integrada na sua Plataforma para a finalidade de recolher dados e prefer&ecirc;ncias dos Utilizadores e para os usar com os seus sistemas de CRM e tecnologia avan&ccedil;ada para
                        benef&iacute;cio dos Utilizadores. Ser&aacute; efetuado o tratamento seguinte dos dados atrav&eacute;s das informa&ccedil;&otilde;es recolhidas:
                    </span>
                </p>
                <ul class="c12 lst-kix_ofarb2big706-0 start">
                    <li class="c20 c5 li-bullet-0">
                        <span class="c0">
                            A KARAPAU.TECH pode enviar mensagens promocionais e/ou ofertas relacionadas com o servi&ccedil;o oferecido por si que possam ser do interesse dos Utilizadores. A Karapau.Tech pode aferir e personalizar essa publicidade
                            de acordo com as prefer&ecirc;ncias dos Utilizadores. Se um Utilizador da Karapau.Tech n&atilde;o desejar receber estas informa&ccedil;&otilde;es e/ou comunica&ccedil;&otilde;es comerciais, pode escolher em qualquer
                            momento &ldquo;Cancelar a subscri&ccedil;&atilde;o&rdquo; no e-mail, e a KARAPAU.TECH deixar&aacute; imediatamente de enviar as informa&ccedil;&otilde;es acima mencionadas.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            A KARAPAU.TECH tamb&eacute;m pode enviar aos Utilizadores mensagens e/ou ofertas relacionadas com esses servi&ccedil;os atrav&eacute;s de notifica&ccedil;&otilde;es &ldquo;push&rdquo;, que consistem no envio dessas
                            mensagens promocionais e/ou ofertas para os respetivos telem&oacute;veis. Se um Utilizador da KARAPAU.TECH n&atilde;o desejar receber as comunica&ccedil;&otilde;es comerciais descritas nesta cl&aacute;usula e em 3.1
                            acima, pode remov&ecirc;-las desativando-as com um &uacute;nico clique nas prefer&ecirc;ncias de privacidade do seu perfil.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            A KARAPAU.TECH e ou os terceiros associados &agrave; Karapau.Tech podem usar os endere&ccedil;os de entrega da encomenda inseridos pelo Utilizador para os efeitos de desenvolver atividades promocionais para a entrega de
                            amostras ou produtos gratuitos do servi&ccedil;o relacionado com a KARAPAU.TECH que possam interessar ao Utilizador (p. Ex., entrega de amostras gratuitas ou de folhetos de publicidade) ao mesmo tempo que entregam a
                            encomenda.
                        </span>
                    </li>
                    <li class="c23 c5 li-bullet-0">
                        <span class="c0">
                            Como resultado da utiliza&ccedil;&atilde;o da Plataforma da Karapau.Tech, os Utilizadores tamb&eacute;m podem receber comunica&ccedil;&otilde;es comerciais de terceiros associados com a Plataforma, como o Facebook ou o
                            Google, tudo isto de acordo com as prefer&ecirc;ncias de privacidade definidas por cada Utilizador nas referidas Plataformas.
                        </span>
                    </li>
                </ul>
                <p class="c3">
                    <span class="c0">
                        Os Utilizadores podem usar o centro de gest&atilde;o de privacidade para cancelar a subscri&ccedil;&atilde;o de servi&ccedil;os de marketing online ou para fechar as contas se n&atilde;o desejarem receber amostras com as
                        encomendas da Karapau.Tech.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.7. Para fins de an&aacute;lise estat&iacute;stica e do servi&ccedil;o</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH usa as informa&ccedil;&otilde;es para fins estat&iacute;sticos para analisar o comportamento e tend&ecirc;ncias do Utilizador, para compreender a forma como os Utilizadores usam a Plataforma da KARAPAU.TECH e
                        para gerir e melhorar os servi&ccedil;os oferecidos, incluindo a possibilidade de adicionar servi&ccedil;os diferentes, novos, &agrave; Plataforma.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH tamb&eacute;m utiliza as informa&ccedil;&otilde;es para investigar e analisar como melhorar os servi&ccedil;os que presta aos Utilizadores, assim como para desenvolver e melhorar as caracter&iacute;sticas do
                        servi&ccedil;o que oferece.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.2.8. Para garantir seguran&ccedil;a e um ambiente adequado para o fornecimento seguro de servi&ccedil;os</span></p>
                <p class="c3"><span class="c0">A KARAPAU.TECH pode usar os dados para garantir a utiliza&ccedil;&atilde;o apropriada dos produtos solicitados na Plataforma.</span></p>
                <p class="c3"><span class="c2">3.2.9. Para processar incidentes e reclama&ccedil;&otilde;es junto das seguradoras</span></p>
                <p class="c3">
                    <span class="c0">
                        Se um Utilizador contactar a KARAPAU.TECH para comunicar a ocorr&ecirc;ncia de qualquer dano ou evento imprevisto que possa estar coberto pela ap&oacute;lice de seguro da KARAPAU.TECH, a KARAPAU.TECH tratar&aacute; todos os
                        dados relacionados com o incidente para tratar e dar resposta aos pedidos.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.3 Fundamento Jur&iacute;dico do Tratamento</span></p>
                <p class="c3"><span class="c0">Os dados dos utilizadores s&atilde;o tratados de acordo com os fundamentos jur&iacute;dicos seguintes:</span></p>
                <ul class="c12 lst-kix_vd0jhxhcam71-0 start">
                    <li class="c20 c5 li-bullet-0">
                        <span class="c0">Para cumprir a rela&ccedil;&atilde;o contratual ap&oacute;s o registo dos Utilizadores na plataforma (por exemplo, tratamento dos dados para entrega de uma encomenda feita).</span>
                    </li>
                    <li class="c1 li-bullet-0"><span class="c0">Com base no nosso interesse leg&iacute;timo (como a monitoriza&ccedil;&atilde;o para a preven&ccedil;&atilde;o de fraudes atrav&eacute;s da Plataforma).</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            &nbsp;Para cumprir as nossas obriga&ccedil;&otilde;es legais (como, por exemplo, quando autoridades competentes solicitam dados relacionados com investiga&ccedil;&otilde;es judiciais e/ou para instaurar as
                            a&ccedil;&otilde;es necess&aacute;rias para proteger os interesses da KARAPAU.TECH):
                        </span>
                    </li>
                    <li class="c23 c5 li-bullet-0"><span class="c0">Consentimento expresso para a divulga&ccedil;&atilde;o dos dados dos utilizadores a terceiros para fazermos comunica&ccedil;&otilde;es comerciais.</span></li>
                </ul>
                <p class="c3"><span class="c2">3.4 Destinat&aacute;rios dos Dados</span></p>
                <p class="c3">
                    <span class="c0">
                        A KARAPAU.TECH garante que todos os parceiros comerciais, t&eacute;cnicos, fornecedores ou terceiros independentes est&atilde;o vinculados por promessas contratualmente vinculativas para tratarem as informa&ccedil;&otilde;es
                        partilhadas com eles de acordo com as indica&ccedil;&otilde;es da KARAPAU.TECH, esta Pol&iacute;tica de Privacidade e a legisla&ccedil;&atilde;o sobre prote&ccedil;&atilde;o de dados aplic&aacute;vel. N&atilde;o divulgaremos
                        os seus dados pessoais a qualquer terceiro que n&atilde;o atue sob as nossas instru&ccedil;&otilde;es, e nenhuma comunica&ccedil;&atilde;o envolver&aacute; a venda, aluguer, partilha ou de qualquer outra forma
                        revelar&aacute; as informa&ccedil;&otilde;es pessoais dos clientes para fins comerciais em viola&ccedil;&atilde;o dos compromissos feitos nesta Pol&iacute;tica de Privacidade.&nbsp;
                    </span>
                </p>
                <p class="c3"><span class="c2">3.4.1. Ao executar uma encomenda, os dados podem ser partilhados com:&nbsp;</span></p>
                <ul class="c12 lst-kix_70goihj5a4ss-0 start">
                    <li class="c20 c5 li-bullet-0"><span class="c0">O Mandat&aacute;rio que realiza a tarefa de recolher e entregar o produto.</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            O estabelecimento ou local encarregado da venda do produto, se o Utilizador tiver solicitado a compra de um produto. Se um Utilizador contactar diretamente os fornecedores acima referidos, dando-lhes os dados
                            diretamente, a KARAPAU.TECH n&atilde;o ser&aacute; respons&aacute;vel pela utiliza&ccedil;&atilde;o desses dados pelos fornecedores.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Os Servi&ccedil;os de Apoio ao Cliente contratados pela Karapau.Tech para avisarem o Utilizador sobre quaisquer poss&iacute;veis incidentes ou para perguntar a raz&atilde;o de ter sido dada ao servi&ccedil;o uma
                            opini&atilde;o negativa &nbsp; A KARAPAU.TECH pode usar os dados fornecidos para gerir quaisquer incidentes que possam ocorrer durante a presta&ccedil;&atilde;o dos servi&ccedil;os.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0"><span class="c0">A Plataforma de pagamentos e os fornecedores de servi&ccedil;os de pagamentos para que o montante possa ser faturado na conta do Utilizador.</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Prestadores de servi&ccedil;os: de telecomunica&ccedil;&otilde;es, quando s&atilde;o utilizados para enviar comunica&ccedil;&otilde;es relativas a encomendas ou incidentes relacionados com as encomendas.&nbsp;
                        </span>
                    </li>
                    <li class="c5 c23 li-bullet-0"><span class="c0">Fornecedores que prestam servi&ccedil;os de inqu&eacute;ritos de satisfa&ccedil;&atilde;o em nome da KARAPAU.TECH.</span></li>
                </ul>
                <p class="c3"><span class="c2">3.4.2.</span><span class="c15">&nbsp;</span><span class="c2">Partilhar dados do Utilizador com terceiros:</span></p>
                <p class="c3"><span class="c0">Para continuar a prestar os servi&ccedil;os oferecidos atrav&eacute;s da Plataforma, a KARAPAU.TECH pode partilhar determinados dados pessoais dos Utilizadores com</span></p>
                <ul class="c12 lst-kix_sdods1cqe1ar-0 start">
                    <li class="c20 c5 li-bullet-0">
                        <span class="c0">
                            Prestadores de servi&ccedil;os: Os terceiros prestadores de servi&ccedil;os da KARAPAU.TECH que enviam encomendas, efetuam encomendas e/ou resolvem incidentes com entregas ter&atilde;o acesso &agrave;s
                            informa&ccedil;&otilde;es pessoais dos Utilizadores consoante necess&aacute;rio para realizarem as respetivas fun&ccedil;&otilde;es, mas n&atilde;o as podem utilizar para outra finalidade. T&ecirc;m de tratar as
                            referidas informa&ccedil;&otilde;es pessoais como disposto nesta Pol&iacute;tica de Privacidade e na legisla&ccedil;&atilde;o sobre prote&ccedil;&atilde;o de dados aplic&aacute;vel.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Farm&aacute;cias: A Karapau.Tech pode fornecer o nome e n&uacute;mero de telefone de um Utilizador aos farmac&ecirc;uticos que dispensam os produtos a esses Utilizadores para garantir a presta&ccedil;&atilde;o de
                            aconselhamento farmac&ecirc;utico de acordo com a legisla&ccedil;&atilde;o atual aplic&aacute;vel.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c15">
                            Prestadores de Servi&ccedil;os de Pagamento: Quando um Utilizador introduz o n&uacute;mero de cart&atilde;o na Plataforma da Karapau.Tech, este &eacute; armazenado diretamente pelas Plataformas de Pagamentos contratadas
                            pela KARAPAU.TECH, o que permite que o pagamento seja faturado na conta do Utilizador. Os prestadores de servi&ccedil;os de pagamento foram escolhidos com base nas respetivas medidas de seguran&ccedil;a e em qualquer
                            caso por cumprirem as medidas de seguran&ccedil;a estipuladas pela legisla&ccedil;&atilde;o relativa ao servi&ccedil;o de pagamentos, s&atilde;o
                        </span>
                        <span class="c9">PC1 Compliant</span><span class="c15">&nbsp;nos termos da </span><span class="c9">Payment Card Industry Data Security Standard</span>
                        <span class="c0">&nbsp;[Norma de Seguran&ccedil;a de Dados da Ind&uacute;stria de Cart&otilde;es de Pagamento] ou PCI DSS.&nbsp; Em nenhum caso a KARAPAU.TECH conserva esses dados.&nbsp;</span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Prestadores de servi&ccedil;os para fins de controlo de fraudes: A KARAPAU.TECH partilhar&aacute; os dados dos Utilizadores com prestadores de servi&ccedil;os de controlo de fraude para avaliar o risco das
                            transa&ccedil;&otilde;es realizadas.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Prestadores de servi&ccedil;os para a anonimiza&ccedil;&atilde;o de alguns dados: Para prevenir a utiliza&ccedil;&atilde;o indevida dos dados dos Utilizadores por terceiros prestadores de servi&ccedil;os, a KARAPAU.TECH
                            pode divulgar os dados dos utilizadores para efeitos da respetiva anonimiza&ccedil;&atilde;o para que possam ser utilizados apenas para o fornecimento do servi&ccedil;o aos Utilizadores. Por exemplo, a KARAPAU.TECH pode
                            ceder os n&uacute;meros de telefone dos Utilizadores a terceiros para serem anonimizados e fornecidos nesse formato aos fornecedores utilizados para realizar os servi&ccedil;os contratados pelos Utilizadores.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Empresas de seguran&ccedil;a e Autoridades respons&aacute;veis pela aplica&ccedil;&atilde;o da lei: A KARAPAU.TECH pode divulgar informa&ccedil;&otilde;es e dados pessoais sobre as contas dos nossos clientes se acreditar
                            que essa divulga&ccedil;&atilde;o &eacute; necess&aacute;ria para o cumprimento da lei, para fazer cumprir ou aplicar as &ldquo;Condi&ccedil;&otilde;es de Utiliza&ccedil;&atilde;o&rdquo; ou para proteger os direitos,
                            propriedade ou seguran&ccedil;a da KARAPAU.TECH, dos seus utilizadores ou de terceiros. O acima referido inclui, consequentemente, a troca de informa&ccedil;&otilde;es com outras empresas e organiza&ccedil;&otilde;es,
                            assim como com as Autoridades respons&aacute;veis pela aplica&ccedil;&atilde;o da lei, para prote&ccedil;&atilde;o contra fraude e para reduzir o risco de cr&eacute;dito. Ap&oacute;s lhe ser exigido legalmente que o
                            fa&ccedil;a, a KARAPAU.TECH pode partilhar informa&ccedil;&otilde;es com organismos de autoridades executivas e/ou terceiros em rela&ccedil;&atilde;o a pedidos de informa&ccedil;&otilde;es relacionados com
                            investiga&ccedil;&otilde;es criminais e presum&iacute;veis atividades ilegais.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c15">Servi&ccedil;os de </span><span class="c9">Call centre</span><span class="c15">&nbsp;e gest&atilde;o de incidentes: Para prestar um Servi&ccedil;o de Apoio aos Clientes e de </span>
                        <span class="c9">call centre</span>
                        <span class="c0">
                            , a&ccedil;&otilde;es para medir o grau de satisfa&ccedil;&atilde;o dos Utilizadores e a presta&ccedil;&atilde;o de servi&ccedil;os de apoio administrativo, a KARAPAU.TECH pode divulgar os dados dos Utilizadores a
                            empresas localizadas fora do EEE, desde que esteja autorizada a faz&ecirc;-lo e os requisitos de seguran&ccedil;a mencionados na sec&ccedil;&atilde;o precedente tenham sido cumpridos.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c15">Servi&ccedil;os de telecomunica&ccedil;&otilde;es</span><span class="c9">:</span>
                        <span class="c0">
                            &nbsp;Para poder fornecer aos utilizadores servi&ccedil;os de contacto telef&oacute;nico, a KARAPAU.TECH pode contactar empresas de telecomunica&ccedil;&otilde;es para providenciarem linhas e sistemas seguros com a
                            finalidade de contactar os Utilizadores. &nbsp;
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Empresas do grupo da KARAPAU.TECH: Para poder prestar os servi&ccedil;os, a KARAPAU.TECH pode transferir determinados dados pessoais dos Utilizadores para subsidi&aacute;rias, com base na &aacute;rea geogr&aacute;fica a
                            partir da qual os utilizadores solicitam os nossos servi&ccedil;os. Os Utilizadores s&atilde;o informados pelo presente que, quando se registam na Plataforma de qualquer pa&iacute;s em que a KARAPAU.TECH opera, os seus
                            dados ser&atilde;o conservados na base de dados da KARAPAU.TECH, situada na Irlanda e que pertence &agrave; empresa espanhola KARAPAU.TECH. No caso de subsidi&aacute;rias localizadas fora do EEE, os dados ser&atilde;o
                            transferidos, usando os sistemas estabelecidos pela Comiss&atilde;o Europeia e pelo RGPD, para pa&iacute;ses com um n&iacute;vel adequado de prote&ccedil;&atilde;o de dados pessoais ou atrav&eacute;s de contratos
                            aprovados pela Comiss&atilde;o Europeia que estabelecem e garantem os direitos dos titulares dos dados.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Redes sociais ligadas pelos Utilizadores. Se um Utilizador ligar a sua conta da KARAPAU.TECH com outra rede social ou plataforma de terceiros, a KARAPAU.TECH pode usar as informa&ccedil;&otilde;es fornecidas a essa rede
                            social ou terceiro, desde que tenham sido disponibilizadas &agrave; KARAPAU.TECH em conformidade com a pol&iacute;tica de privacidade da rede social ou da plataforma de terceiros em quest&atilde;o.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Terceiros associados com a KARAPAU.TECH para efeitos de comunica&ccedil;&otilde;es comerciais: A Karapau.Tech pode, com o consentimento expresso do Utilizador, transferir os dados pessoais para terceiros associados com a
                            Karapau.Tech, desde que o Utilizador tenha dado o seu consentimento informado, inequ&iacute;voco e expresso para essa transfer&ecirc;ncia e tenha conhecimento da finalidade e do destinat&aacute;rio dessa
                            transfer&ecirc;ncia.
                        </span>
                    </li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            Mudan&ccedil;as de propriedade: Se a propriedade da KARAPAU.TECH mudar ou se a maioria dos ativos forem adquiridos por um terceiro, os Utilizadores ser&atilde;o informados de que a KARAPAU.TECH ir&aacute; transferir os
                            dados para as organiza&ccedil;&otilde;es adquirentes para continuar a prestar os servi&ccedil;os sujeitos ao tratamento de dados. O novo respons&aacute;vel pelo tratamento informar&aacute; os Utilizadores sobre os seus
                            dados de identifica&ccedil;&atilde;o. A KARAPAU.TECH declara que ir&aacute; cumprir o dever de informa&ccedil;&atilde;o para com a Autoridade de Controlo relevante no caso de surgirem essas circunst&acirc;ncias, e que
                            informar&aacute; os utilizadores sobre a altera&ccedil;&atilde;o do respons&aacute;vel de tratamento se e quando tal acontecer. Este tratamento deve ser realizado nos termos do contrato celebrado com a KARAPAU.TECH.
                        </span>
                    </li>
                    <li class="c23 c5 li-bullet-0">
                        <span class="c0">
                            Seguradoras: A Karapau.Tech pode fornecer os dados dos utilizadores &agrave;s seguradoras e corretores de seguros com que tem um contrato em vigor para a gest&atilde;o e tratamento de sinistros e perdas resultantes da
                            atividade desenvolvida pela Karapau.Tech e pelas partes que colaboram com a Karapau.Tech.
                        </span>
                    </li>
                </ul>
                <p class="c3">
                    <span class="c0">
                        Os dados dos Utilizadores da KARAPAU.TECH n&atilde;o ser&atilde;o divulgados a terceiros a menos que: (i) tal seja necess&aacute;rio para prestar os servi&ccedil;os solicitados se a KARAPAU.TECH estiver a colaborar com
                        terceiros; (ii) se a KARAPAU.TECH tiver a autoriza&ccedil;&atilde;o expressa e inequ&iacute;voca do Utilizador; (iii) quando tal tiver sido solicitado por uma autoridade competente no cumprimento das suas
                        fun&ccedil;&otilde;es (para investigar, prevenir ou atuar em rela&ccedil;&atilde;o a a&ccedil;&otilde;es ilegais); ou (iv) finalmente, quando exigido por lei.
                    </span>
                </p>
                <p class="c3"><span class="c15">&nbsp;</span><span class="c2">3.5. Transfer&ecirc;ncias Internacionais de Dados</span></p>
                <p class="c3">
                    <span class="c0">
                        Ao escolher os prestadores de servi&ccedil;os, a KARAPAU.TECH pode transferir os dados dos utilizadores para fora das fronteiras do Espa&ccedil;o Econ&oacute;mico Europeu. Nesses casos, a KARAPAU.TECH ir&aacute; garantir,
                        antes de enviar os dados, que esses prestadores de servi&ccedil;os respeitam os padr&otilde;es m&iacute;nimos de seguran&ccedil;a estabelecidos pela Comiss&atilde;o Europeia e que tratam permanentemente os dados de acordo
                        com as instru&ccedil;&otilde;es da KARAPAU.TECH. A KARAPAU.TECH pode ter uma rela&ccedil;&atilde;o contratual com eles ao abrigo da qual os prestadores de servi&ccedil;os concordam cumprir as instru&ccedil;&otilde;es da
                        KARAPAU.TECH e a adotar as medidas de seguran&ccedil;a necess&aacute;rias para proteger os dados dos Utilizadores.
                    </span>
                </p>
                <p class="c3"><span class="c2">3.6. Per&iacute;odos de conserva&ccedil;&atilde;o</span></p>
                <p class="c3">
                    <span class="c0">
                        Os dados dos Utilizadores ser&atilde;o conservados durante a execu&ccedil;&atilde;o e manuten&ccedil;&atilde;o da rela&ccedil;&atilde;o contratual; i.e., durante o tempo em que sejam utilizadores da KARAPAU.TECH ou
                        at&eacute; que exer&ccedil;am o direito de limitar o acesso aos respetivos dados.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Ap&oacute;s um Utilizador ter cancelado o registo na Plataforma, a KARAPAU.TECH conservar&aacute; os seus dados durante o per&iacute;odo estabelecido na legisla&ccedil;&atilde;o fiscal, sanit&aacute;ria, criminal e em
                        qualquer outra legisla&ccedil;&atilde;o que possa ser aplic&aacute;vel, para efeitos de instaurar ou de se defender de quaisquer a&ccedil;&otilde;es judiciais em que a KARAPAU.TECH possa ser parte. Em qualquer caso, a
                        KARAPAU.TECH bloquear&aacute; os dados do Utilizador para que apenas possam ser consultados se tiver de instaurar uma a&ccedil;&atilde;o ou se tiver de se defender de uma a&ccedil;&atilde;o relacionada com os mesmos.
                    </span>
                </p>
                <p class="c3" id="h.gjdgxs-1">
                    <span class="c15">Relativamente &agrave;s informa&ccedil;&otilde;es an&oacute;nimas, a KARAPAU.TECH aplicar&aacute; tudo o estabelecido no Considerando 26 do RGPD, de acordo com o qual </span>
                    <span class="c9">
                        &ldquo;Os princ&iacute;pios da prote&ccedil;&atilde;o de dados n&atilde;o dever&atilde;o, pois, aplicar-se &agrave;s informa&ccedil;&otilde;es an&oacute;nimas, ou seja, &agrave;s informa&ccedil;&otilde;es que n&atilde;o
                        digam respeito a uma pessoa singular identificada ou identific&aacute;vel nem a dados pessoais tornados de tal modo an&oacute;nimos que o seu titular n&atilde;o seja ou j&aacute; n&atilde;o possa ser identificado.
                    </span>
                    <span class="c15">&nbsp;</span>
                    <span class="c9">O presente regulamento n&atilde;o diz, por isso, respeito ao tratamento dessas informa&ccedil;&otilde;es an&oacute;nimas, inclusive para fins estat&iacute;sticos ou de investiga&ccedil;&atilde;o.&rdquo;</span>
                </p>
                <ul class="c12 lst-kix_jonc8fpitegg-0 start">
                    <li class="c3 c5 li-bullet-0"><span class="c2">Exerc&iacute;cio de Direitos</span></li>
                </ul>
                <h2 class="c3" id="h.hmzkp8k44du">
                    <span class="c33 c28">
                        Os Utilizadores podem exercer os respetivos direitos em qualquer momento, gratuitamente, usando o formul&aacute;rio dispon&iacute;vel na Plataforma. Tamb&eacute;m podem exercer esses direitos enviando um e-mail para o
                        seguinte endere&ccedil;o de correio eletr&oacute;nico:
                    </span>
                    <span class="c4"><a class="c21" href="mailto:geral@karapau.pt">geral@karapau.pt</a></span>
                    <span class="c7 c33 c28">
                        &nbsp;. &nbsp;O e-mail tem de especificar qual o direito que pretendem exercer, assim como, quando aplic&aacute;vel, os dados de identifica&ccedil;&atilde;o registados na Plataforma. Iremos contactar o Utilizador se
                        necessitarmos de dados adicionais aos fornecidos para verificar a respetiva identidade.&nbsp;
                    </span>
                </h2>
                <p class="c3"><span class="c0">Pode exercer os direitos seguintes em rela&ccedil;&atilde;o &agrave; KARAPAU.TECH:</span></p>
                <ul class="c12 lst-kix_a0rk5j6vy0h-0 start">
                    <li class="c20 c5 li-bullet-0">
                        <span class="c0">O direito de acesso aos seus dados pessoais para saber quais os dados que est&atilde;o a ser tratados e as opera&ccedil;&otilde;es de tratamento realizadas com os mesmos;</span>
                    </li>
                    <li class="c1 li-bullet-0"><span class="c0">O direito de corrigir quaisquer inexatid&otilde;es relacionadas com os seus dados pessoais;</span></li>
                    <li class="c1 li-bullet-0"><span class="c0">O direito de apagamento dos seus dados pessoais, quando poss&iacute;vel;</span></li>
                    <li class="c1 li-bullet-0">
                        <span class="c0">
                            O direito de solicitar a restri&ccedil;&atilde;o do tratamento dos seus dados pessoais quando a exatid&atilde;o, legalidade ou necessidade de tratamento dos dados estiver em causa, caso em que podemos conservar os dados
                            para efeitos de instaurar a&ccedil;&otilde;es judiciais ou para nos defendermos de a&ccedil;&otilde;es judiciais.&nbsp;
                        </span>
                    </li>
                    <li class="c23 c5 li-bullet-0">
                        <span class="c15">
                            O direito de objetar ao tratamento dos seus dados para resolver qualquer quest&atilde;o sobre que nos possa ter consultado atrav&eacute;s do formul&aacute;rio de contacto, e o direito de objetar ao tratamento dos seus
                            dados nas redes sociais e/ou para efeitos de tratamento do seu CV. Al&eacute;m disso, pode retirar&nbsp; em qualquer momento o seu consentimento para receber comunica&ccedil;&otilde;es comerciais, atrav&eacute;s do
                            perfil de Utilizador da Plataforma, enviando-nos um e-mail ou usando o
                        </span>
                        <span class="c9">link</span><span class="c0">&nbsp;fornecido para este efeito em todas as comunica&ccedil;&otilde;es comerciais.</span>
                    </li>
                </ul>
                <p class="c3">
                    <span class="c15">Se acreditar que a KARAPAU.TECH est&aacute; a violar a legisla&ccedil;&atilde;o de prote&ccedil;&atilde;o de dados, n&atilde;o hesite em contactar-nos para o endere&ccedil;o de correio eletr&oacute;nico </span>
                    <span class="c33">&nbsp;</span><span class="c19"><a class="c21" href="mailto:geral@karapau.pt">geral@karapau.pt</a></span>
                    <span class="c0">
                        &nbsp;dizendo-nos o que considera estar em causa, para que possamos resolver o problema com a maior brevidade poss&iacute;vel. Em qualquer caso, tamb&eacute;m pode comunicar o problema &agrave; CNPD &ndash; Comissao Nacional
                        de protec&ccedil;&atilde;o de Dados (Portugal) e apresentar uma reclama&ccedil;&atilde;o ao referido organismo para a prote&ccedil;&atilde;o dos seus direitos.
                    </span>
                </p>
                <ul class="c12 lst-kix_1y1gxezahszk-0 start">
                    <li class="c3 c5 li-bullet-0"><span class="c2">Medidas de Seguran&ccedil;a</span></li>
                </ul>
                <p class="c3">
                    <span class="c15">
                        A KARAPAU.TECH tem adotado as medidas necess&aacute;rias recomendadas pela Comiss&atilde;o Europeia e pela autoridade competente para manter o n&iacute;vel de seguran&ccedil;a exigido, de acordo com a natureza dos dados
                        pessoais tratados e as circunst&acirc;ncias do tratamento, para evitar, na medida do poss&iacute;vel e sempre de acordo com o
                    </span>
                    <span class="c9">estado da arte</span>
                    <span class="c0">
                        , a sua altera&ccedil;&atilde;o, perda ou acesso ou tratamento n&atilde;o autorizado. Como mencionado acima, os dados pessoais fornecidos n&atilde;o ser&atilde;o divulgados a terceiros sem a pr&eacute;via
                        autoriza&ccedil;&atilde;o do titular dos dados.
                    </span>
                </p>
                <ul class="c12 lst-kix_nkbwmkwxqta0-0 start">
                    <li class="c3 c5 li-bullet-0"><span class="c2">Notifica&ccedil;&otilde;es e modifica&ccedil;&otilde;es</span></li>
                </ul>
                <p class="c3">
                    <span class="c0">
                        Como declarado acima, todos os Utilizadores t&ecirc;m o direito de aceder, atualizar e apagar os respetivos dados, assim como de se opor ao tratamento dos mesmos. Pode exercer estes direitos, ou fazer consultas relacionadas
                        com a Pol&iacute;tica de Privacidade da KARAPAU.TECH, atrav&eacute;s do Formul&aacute;rio de Contacto.
                    </span>
                </p>
                <p class="c3">
                    <span class="c0">
                        Devido &agrave; evolu&ccedil;&atilde;o constante das atividades da KARAPAU.TECH, esta Pol&iacute;tica de Privacidade, a Pol&iacute;tica de Cookies e as Condi&ccedil;&otilde;es de Utiliza&ccedil;&atilde;o tamb&eacute;m
                        est&atilde;o sujeitas a altera&ccedil;&otilde;es. A KARAPAU.TECH notificar&aacute; os Utilizadores sobre altera&ccedil;&otilde;es e modifica&ccedil;&otilde;es substanciais desses documentos, por meio de e-mail ou de qualquer
                        outro m&eacute;todo que garanta a sua rece&ccedil;&atilde;o. Em qualquer caso, KARAPAU.TECH n&atilde;o modificar&aacute; em nenhum caso as pol&iacute;ticas ou pr&aacute;ticas para as tornar menos eficazes relativamente
                        &agrave; prote&ccedil;&atilde;o dos dados pessoais dos nossos clientes que tenham sido armazenados anteriormente.
                    </span>
                </p>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c6"><span class="c7 c11 c28">POL&Iacute;TICA DE COOKIES</span></p>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c6"><span class="c11">&nbsp;1.- INFORMA&Ccedil;&Otilde;ES GERAIS SOBRE COOKIES</span></p>
                <ul class="c12 lst-kix_g2lidcgqfgth-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11 c14">O que s&atilde;o?&nbsp;</span>
                        <span class="c7 c8">
                            Os cookies s&atilde;o pequenos ficheiros que os s&iacute;tios Web enviam para o navegador e que s&atilde;o armazenados no terminal do utilizador, que poder&aacute; ser um computador pessoal, um telem&oacute;vel, um
                            tablet, ou qualquer outro dispositivo.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_xulemlmbfoj-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11 c14">Qual a sua fun&ccedil;&atilde;o?&nbsp;</span>
                        <span class="c7 c8">
                            Desempenham uma parte essencial na presta&ccedil;&atilde;o de diversos servi&ccedil;os de TI. Entre outras fun&ccedil;&otilde;es, permitem que um s&iacute;tio Web armazene e recupere informa&ccedil;&otilde;es relativas
                            aos h&aacute;bitos de navega&ccedil;&atilde;o de um utilizador ou ao seu equipamento e, dependendo das informa&ccedil;&otilde;es obtidas, podem ser utilizados para reconhecer o utilizador e melhorar o servi&ccedil;o
                            oferecido atrav&eacute;s de um s&iacute;tio Web e/ou aplica&ccedil;&atilde;o.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_sn9b4c3b1a41-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11 c14">Que tipos de cookies existem?&nbsp;</span>
                        <span class="c7 c8">Os cookies podem ser utilizados em conjunto ou separadamente e podem ser classificados de acordo com diferentes crit&eacute;rios, tais como:</span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_xc1sporbq07j-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11 c14">A finalidade</span>
                        <span class="c7 c8">&nbsp;(cookies t&eacute;cnicos, cookies de an&aacute;lise, personaliza&ccedil;&atilde;o, conforme definido na sec&ccedil;&atilde;o 3 da presente Pol&iacute;tica.)</span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_i79ypu9uy2el-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11 c14">A entidade de gest&atilde;o</span>
                        <span class="c7 c8">
                            &nbsp;(det&eacute;m cookies estabelecidos pelo dom&iacute;nio do s&iacute;tio Web visitado pelo utilizador ou cookies de terceiros que s&atilde;o aqueles estabelecidos e geridos por diferentes dom&iacute;nios do
                            s&iacute;tio Web visitado com o objetivo de ser capaz de enviar publicidade personalizada aos utilizadores.)
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_oh3935xl6kkv-0 start">
                    <li class="c6 c5 li-bullet-0"><span class="c11 c14">O tempo de atividade ou conserva&ccedil;&atilde;o e armazenamento</span><span class="c7 c8">&nbsp;(cookies de sess&atilde;o ou cookies persistentes), etc.</span></li>
                </ul>
                <p class="c6"><span class="c7 c8">&nbsp;</span></p>
                <p class="c6"><span class="c7 c11 c28">2.- REGULAMENTA&Ccedil;&Atilde;O DOS COOKIES</span></p>
                <p class="c6">
                    <span class="c7 c8">
                        De acordo com os requisitos do RGPD, as diferentes regulamenta&ccedil;&otilde;es locais que podem ser aplic&aacute;veis dependendo do territ&oacute;rio e os requisitos das Resolu&ccedil;&otilde;es do Tribunal de
                        Justi&ccedil;a Europeu, juntamente com as resolu&ccedil;&otilde;es das diferentes autoridades de prote&ccedil;&atilde;o de dados locais.
                    </span>
                </p>
                <ol class="c12 lst-kix_gl45ts9x7mne-0 start" start="1">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c10">O utilizador deve ter acesso a </span><span class="c11">informa&ccedil;&otilde;es claras e pormenorizadas relativas &agrave;s atividades de tratamento de dados realizadas utilizando cookies</span>
                        <span class="c7 c8">&nbsp;e</span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c10">O utilizador deve ter a </span><span class="c11">possibilidade de i) rejeitar todos os cookies, ii) ativar todos, iii) ativ&aacute;-los ou rejeit&aacute;-los caso a caso</span>
                        <span class="c7 c8">&nbsp;mediante uma a&ccedil;&atilde;o expressa.</span>
                    </li>
                </ol>
                <p class="c6">
                    <span class="c7 c8">Por conseguinte, a KARAPAU.TECH presta-lhe, enquanto um utilizador do nosso s&iacute;tio Web e/ou aplica&ccedil;&atilde;o, as seguintes informa&ccedil;&otilde;es:<br /></span>
                </p>
                <p class="c6"><span class="c7 c11 c28">3.- FIQUE A CONHECER AS NOSSAS ATIVIDADES DE COOKIES</span></p>
                <p class="c6"><span class="c10">&nbsp;</span><span class="c11">1.&nbsp;Identifique o nosso respons&aacute;vel pelo tratamento e pelos cookies, bem como o EPD</span></p>
                <ul class="c12 lst-kix_c3fob6kql2k0-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            A entidade supracitada est&aacute; empenhada em proteger as suas informa&ccedil;&otilde;es pessoais quando utiliza o nosso s&iacute;tio Web e aplica&ccedil;&otilde;es e oferece as seguintes informa&ccedil;&otilde;es
                            relativas &agrave; utiliza&ccedil;&atilde;o de cookies na sua plataforma em linha.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_isocmogfuqxb-0 start">
                    <li class="c35 c5 li-bullet-0">
                        <h2 id="h.owpzs9owhfa" style="display: inline;">
                            <span class="c8">Contacto do EPD: </span><span class="c36 c8"><a class="c21" href="mailto:geral@karapau.pt">geral@karapau.pt</a></span>
                        </h2>
                    </li>
                    <li class="c35 c5 li-bullet-0">
                        <h2 id="h.mtp8op14vb5b" style="display: inline;">
                            <span class="c8"><br /></span><span class="c7 c11 c38">2. Cookies que utilizamos e finalidades</span>
                        </h2>
                    </li>
                </ul>
                <p class="c6"><span class="c7 c8">A KARAPAU.TECH pode usar diferentes tipos de cookies, que podem ser livremente verificados e geridos pelo utilizador quando acede &agrave; Web. Os cookies s&atilde;o descritos a seguir:</span></p>
                <ul class="c12 lst-kix_7dm2y9vuubd9-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies pr&oacute;prios. </span>
                        <span class="c7 c8">
                            S&atilde;o aqueles enviados para o terminal dos utilizadores a partir de um computador ou dom&iacute;nio gerido pela KARAPAU.TECH e a partir do qual o servi&ccedil;o solicitado pelo utilizador &eacute; prestado.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_pe0d02bkutgp-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies de terceiros.</span>
                        <span class="c7 c8">
                            &nbsp;S&atilde;o aqueles enviados para o terminal dos utilizadores a partir de um computador ou dom&iacute;nio n&atilde;o gerido pela KARAPAU.TECH e a partir do qual o servi&ccedil;o solicitado pelo utilizador &eacute;
                            prestado, mas por outra entidade que trata os dados recolhidos pelo cookie.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_9f2knmnjlgcx-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies de sess&atilde;o.</span>
                        <span class="c7 c8">
                            &nbsp;Trata-se de um tipo de cookie concebido para recolher e armazenar informa&ccedil;&otilde;es enquanto o utilizador est&aacute; a aceder a um s&iacute;tio Web. Estes cookies n&atilde;o s&atilde;o armazenados no
                            computador do utilizador quando a sess&atilde;o expira ou o navegador &eacute; fechado.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_37ntjcd7dkqy-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies funcionais.</span>
                        <span class="c7 c8">
                            &nbsp;Trata-se de um tipo de cookies nos quais os dados continuam a ser armazenados no terminal do utilizador e podem ser acedidos e tratados durante um per&iacute;odo definido pelo respons&aacute;vel pelo cookie, que
                            pode variar de alguns minutos a v&aacute;rios anos. Os cookies funcionais permitem ao s&iacute;tio Web funcionar corretamente e, portanto, s&atilde;o necess&aacute;rios e n&atilde;o opcionais. Contudo, o utilizador pode
                            elimin&aacute;-los em qualquer altura. A limita&ccedil;&atilde;o das suas fun&ccedil;&otilde;es vai tamb&eacute;m depender do navegador utilizado pelo utilizador.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_voe4nt3m9ami-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies t&eacute;cnicos.</span>
                        <span class="c7 c8">
                            &nbsp;Trata-se de cookies que permitem ao utilizador navegar a p&aacute;gina Web, plataforma ou aplica&ccedil;&atilde;o e utilizar as diferentes op&ccedil;&otilde;es ou servi&ccedil;o da mesma, por exemplo, controlar o
                            tr&aacute;fego e a comunica&ccedil;&atilde;o de dados, identificar a sess&atilde;o, aceder a &aacute;reas restritas do s&iacute;tio Web, registar elementos que necess&aacute;rios para fazer uma encomenda, fazer uma
                            subscri&ccedil;&atilde;o ou um pedido para participar num evento, utilizar os elementos de seguran&ccedil;a durante a navega&ccedil;&atilde;o, armazenar conte&uacute;dos para transmitir v&iacute;deos ou som ou partilhar
                            conte&uacute;dos nas redes sociais.&nbsp;
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_lp2thzu9x798-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies de personaliza&ccedil;&atilde;o.</span>
                        <span class="c7 c8">
                            &nbsp;Trata-se de cookies que permitem ao utilizador aceder ao servi&ccedil;o de acordo com determinadas caracter&iacute;sticas gerais e pr&eacute;-definidas, segundo um conjunto de crit&eacute;rios no terminal do
                            utilizador, tais como, por exemplo, idioma, tipo de navegador utilizado para aceder ao servi&ccedil;o, configura&ccedil;&atilde;o regional a partir de onde o servi&ccedil;o &eacute; acedido, etc.&nbsp;
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_7azr1yjiwjlz-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c11">Cookies de an&aacute;lise.</span>
                        <span class="c7 c8">
                            &nbsp;Trata-se daqueles que permitem ao seu propriet&aacute;rio monitorizar e analisar o comportamento dos utilizadores do s&iacute;tio Web a que est&atilde;o ligados. As informa&ccedil;&otilde;es recolhidas
                            atrav&eacute;s desses cookies s&atilde;o usadas para medir a atividade do s&iacute;tio Web, plataforma ou aplica&ccedil;&atilde;o e para a caracteriza&ccedil;&atilde;o da navega&ccedil;&atilde;o dos utilizadores do
                            s&iacute;tio Web, plataforma ou aplica&ccedil;&atilde;o, a fim de melhorar o s&iacute;tio Web com base nessa an&aacute;lise.&nbsp;
                        </span>
                    </li>
                </ul>
                <p class="c6"><span class="c7 c8">&nbsp;</span></p>
                <p class="c6"><span class="c7 c11 c28">&nbsp;4.- GEST&Atilde;O DOS SEUS COOKIES</span></p>
                <p class="c6">
                    <span class="c7 c8">
                        Ao navegar este s&iacute;tio Web pela primeira vez, ser&aacute; apresentada uma notifica&ccedil;&atilde;o de cookies, que permitir&aacute; ao utilizador escolher que cookies s&atilde;o guardados no seu navegador:&nbsp;
                    </span>
                </p>
                <ul class="c12 lst-kix_xpba4f7o6z1r-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            Aceitar todos e continuar a navega&ccedil;&atilde;o: a notifica&ccedil;&atilde;o de cookies n&atilde;o voltar&aacute; a ser apresentada e assumir-se-&aacute; que o utilizador aceita a presente Pol&iacute;tica de Cookies.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_krmqjp49ewwr-0 start">
                    <li class="c6 c5 li-bullet-0"><span class="c7 c8">Desativar categorias selecionadas de cookies (excetuando as que s&atilde;o essenciais para o funcionamento do s&iacute;tio Web).</span></li>
                </ul>
                <ul class="c12 lst-kix_6bbcwjygrjou-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            Desativar todos os cookies (excetuando as que s&atilde;o essenciais para o funcionamento do s&iacute;tio Web). Neste caso, o s&iacute;tio Web apenas armazenar&aacute; os cookies que s&atilde;o necess&aacute;rios para o
                            utilizador usar o s&iacute;tio Web.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_h3amu3z9ihng-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            Alterar a configura&ccedil;&atilde;o seguindo as instru&ccedil;&otilde;es a seguir e aceitar&nbsp;ou desativar&nbsp;alguns dos cookies ou apenas obter mais informa&ccedil;&otilde;es sobre cookies e consultar a nossa
                            Pol&iacute;tica de Cookies.
                        </span>
                    </li>
                </ul>
                <ul class="c12 lst-kix_csq99olhze73-0 start">
                    <li class="c5 c6 li-bullet-0"><span class="c7 c8">Em qualquer altura, poder&aacute; aceder ao e gerir o consentimento relativo a cookies efetivo e verificar os cookies efetivos usados pela KARAPAU.TECH.&nbsp;</span></li>
                </ul>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c6" id="h.gjdgxs-2">
                    <span class="c7 c8">
                        De igual modo, a reprodu&ccedil;&atilde;o de conte&uacute;dos que possam reencaminhar o utilizador atrav&eacute;s das hiperliga&ccedil;&otilde;es inseridas num formato diferente no s&iacute;tio Web ou meios de
                        comunica&ccedil;&atilde;o detidos pela KARAPAU.TECH podem conter cookies de propriet&aacute;rios dos referidos conte&uacute;dos reencaminhados. Neste caso, a KARAPAU.TECH n&atilde;o ser&aacute; respons&aacute;vel pelas
                        informa&ccedil;&otilde;es e pelas pol&iacute;ticas fornecidas ao utilizador, nem pelos cookies utilizados que s&atilde;o criados por terceiros.
                    </span>
                </p>
                <ul class="c12 lst-kix_8k75fyjcrte2-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            Caso o utilizador n&atilde;o autorize o tratamento dessas informa&ccedil;&otilde;es, pode modificar a configura&ccedil;&atilde;o do seu navegador, seguindo para tal as informa&ccedil;&otilde;es e os conselhos
                            inclu&iacute;dos nas hiperliga&ccedil;&otilde;es a seguir, relativas &agrave;s configura&ccedil;&otilde;es de cookies:
                        </span>
                    </li>
                </ul>
                <p class="c6"><span class="c11">&nbsp;</span></p>
                <p class="c6"><span class="c11">Para s&iacute;tios Web, siga as hiperliga&ccedil;&otilde;es:</span></p>
                <ul class="c12 lst-kix_sc09n3z4p2d-0 start">
                    <li class="c6 c5 li-bullet-0">
                        <span class="c10 c37">
                            <a class="c21" href="https://www.google.com/url?q=https://support.google.com/chrome/answer/95647?hl%3Dpt&amp;sa=D&amp;source=editors&amp;ust=1626269912203000&amp;usg=AOvVaw1WB6fBjx8kgD_4KpfMsQKZ">Chrome</a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c37 c10">
                            <a class="c21" href="https://www.google.com/url?q=https://support.apple.com/kb/ph21411?locale%3Des_ES&amp;sa=D&amp;source=editors&amp;ust=1626269912204000&amp;usg=AOvVaw0-d15Xll_Ld8vEDCvXXQuD">Safari</a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c37 c10">
                            <a class="c21" href="https://www.google.com/url?q=http://help.opera.com/Windows/12.10/es-ES/cookies.html&amp;sa=D&amp;source=editors&amp;ust=1626269912204000&amp;usg=AOvVaw2EkEvyS7WS1_xD5Cwy7hsX">Opera</a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c37 c10">
                            <a
                                class="c21"
                                href="https://www.google.com/url?q=https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies%23ie%3Die-11&amp;sa=D&amp;source=editors&amp;ust=1626269912204000&amp;usg=AOvVaw20dcKWoYXZW4hqXuQRhcPK"
                            >
                                Explorer
                            </a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c37 c10">
                            <a
                                class="c21"
                                href="https://www.google.com/url?q=https://support.mozilla.org/es/kb/configuracion-privacidad-historial-navegacion-funcion-no-quiero-ser-rastreado?redirectlocale%3Des%26as%3Du%26redirectslug%3Dconfiguracion-de-la-privacidad-el-historial-de-nav&amp;sa=D&amp;source=editors&amp;ust=1626269912205000&amp;usg=AOvVaw1jEaRQI3VfCrl7ZNOLYgY5"
                            >
                                Firefox
                            </a>
                        </span>
                    </li>
                </ul>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c6"><span class="c11">Para telem&oacute;veis, siga as hiperliga&ccedil;&otilde;es:</span></p>
                <ul class="c12 lst-kix_r08tdoxkejdd-0 start">
                    <li class="c6 c5 li-bullet-0"><span class="c7 c8">Para Android: Menu &gt; Mais &gt; Defini&ccedil;&otilde;es &gt; Defini&ccedil;&otilde;es de Privacidade</span></li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c10">Para&nbsp;</span>
                        <span class="c37 c10">
                            <a class="c21" href="https://www.google.com/url?q=https://support.apple.com/es-es/HT201265&amp;sa=D&amp;source=editors&amp;ust=1626269912206000&amp;usg=AOvVaw3ujwZefTeb2oLwcq94cVeF">Safari (IOS).</a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c10">Para&nbsp;</span>
                        <span class="c37 c10">
                            <a
                                class="c21"
                                href="https://www.google.com/url?q=https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies&amp;sa=D&amp;source=editors&amp;ust=1626269912207000&amp;usg=AOvVaw0A1yWiWcn3jQuu6rQgkxe6"
                            >
                                Windows
                            </a>
                        </span>
                    </li>
                    <li class="c6 c5 li-bullet-0">
                        <span class="c7 c8">
                            Se o utilizador estiver a usar outro navegador, pode obter mais informa&ccedil;&otilde;es sobre como configurar a instala&ccedil;&atilde;o de cookies atrav&eacute;s da ajuda ou assist&ecirc;ncia desse navegador.
                        </span>
                    </li>
                </ul>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c6"><span class="c7 c11 c28">5.- OUTRAS INFORMA&Ccedil;&Otilde;ES RELEVANTES</span></p>
                <p class="c6">
                    <span class="c7 c8">
                        A KARAPAU.TECH n&atilde;o &eacute; respons&aacute;vel pela utiliza&ccedil;&atilde;o de cookies que terceiros executam fora dos servi&ccedil;os oferecidos pelos canais e meios de comunica&ccedil;&atilde;o detidos pela
                        KARAPAU.TECH.
                    </span>
                </p>
                <p class="c6"><span class="c7 c8">&nbsp;</span></p>
                <p class="c6"><span class="c7 c11 c28">&nbsp;6.- OBTER MAIS INFORMA&Ccedil;&Otilde;ES</span></p>
                <h2 class="c35" id="h.bpdmtdv18cw">
                    <span class="c8">Os utilizadores podem contactar a KARAPAU.TECH atrav&eacute;s do seguinte endere&ccedil;o eletr&oacute;nico: </span><span class="c8 c36"><a class="c21" href="mailto:geral@karapau.pt">geral@karapau.pt</a></span>
                    <span class="c7 c8">&nbsp;para obterem mais informa&ccedil;&otilde;es sobre cookies.</span>
                </h2>
                <p class="c6 c22"><span class="c7 c8"></span></p>
                <p class="c17"><span class="c7 c29 c28"></span></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

            </div>
          </div>
        </div>
      </div>
@endsection
