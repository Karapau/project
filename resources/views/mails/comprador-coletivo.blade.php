<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Email</title>
</head>

<body>
      <div class="container">

            <div>


                  <p>Seja bem-vindo à Karapau, a plataforma que une pescadores e consumidores.
                       <strong> O seu registo foi feito com sucesso.</strong></p>
                  <p> È para nós motivo de regozijo tê-lo como nosso usuário. Temos como missão garantir aos
                        consumidores em geral não só as
                        melhores práticas ao longo de toda a cadeia de distribuição como também criar condições ao
                        pescador para que possa ver o
                        esforço do seu trabalho ser recompensado de forma justa e equilibrada.</p>
                  <p> Ao instalar a nossa aplicação  pode começar desde já a comprar
                        peixe verdadeiramente
                        fresco diretamente ao pescador e seguramente aos melhores preços de mercado.
                  </p>
                  <p>
                        <strong> Seu login:</strong> {{ $email }}
                        <strong> Sua senha:</strong> {{ $senha }}
                  </p>
             <p> OBS : Obtenha mais informações em <a href="www.karapau.pt">www.karapau.pt</a> , ou contacte nos através dos meios que colocamos a
                  sua disposição </p>

            </div>
      </div>
      <style>
            .container {
                  width: 100%;
                  margin-right: auto;
                  margin-left: auto;
                  text-align: center;
            }
      </style>
</body>

</html>