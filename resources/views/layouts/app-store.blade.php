<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Karapau</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <!-- Fonts -->
    <script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.3/js/all.js"
        integrity="sha384-haqrlim99xjfMxRP6EWtafs0sB1WKcMdynwZleuUSwJR0mDeRYbhtY+KPMr+JL6f" crossorigin="anonymous">
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ url('app-comercial/css/main.min.css') }}">
      <link rel="stylesheet" href="{{ url('app-pescador/css/main.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('app-store/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ url('user/css/main.css') }}">

</head>

<body>
    <div id="app">

        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="{{ url('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('painel/js/timer.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ url('app-comercial/js/script.js') }}"></script>
    <script src="{{ url('app-store/js/script.js') }}"></script>

    @if (Session::has('success'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Sucesso!',
                icon: 'success',
                text: "{{ Session::get('success') }}",
                timer: 5000,
                type: 'success'
            }).then((result) => {
                // Reload the Page
                location.reload();
            });

        </script>

    @endif
    @if (Session::has('error'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Oops!',
                icon: 'error',
                text: "{{ Session::get('error') }}",
                timer: 5000,
                type: 'error'
            }).then((result) => {
                // Reload the Page
                location.reload();
            });

        </script>

    @endif
    <script type="text/javascript">
    var url = "{{ route('store.produto', '') }}"
    var urlImage = "{{ url('storage/portos') }}"
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ url('porto/buscar') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                      console.log(data);
                      $('.portos').find('.row').empty();
                      for(var i = 0; data.length > i; i++){

                        $('.portos').find('.row').append('<div class="col-6">'+'<a href="'+url+'/'+data[i].id+'">'+'<img'+
                                   " "+'src="'+urlImage+'/'+data[i].image+'" alt=""></a>'+
                        '<p>'+data[i].nome+'</p></div>');
                      }

                }
            });
        })

    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });

    </script>
        <script type="text/javascript">

            $('#buscar').on('click', function() {
                $value = $('#cep').val();
                $.ajax({
                    type: 'get',
                    url: '{{ url('adress/cep') }}',
                    data: {
                        'search': $value
                    },
                    success: function(data) {
                          console.log(data);
                          $('#morada').val(data.Morada);
                          $('#regiao').val(data.Localidade);
                          $('#distrito').val(data.Distrito);
                          $('#conselho').val(data.Concelho);
                          $('#freguesia').val(data.Freguesia);
                    }
                });
            })
        </script>
</body>

</html>
