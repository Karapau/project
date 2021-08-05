<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ url('front-app/store/assets/css/porto/style.min.css') }}">
    <title>Karapau</title>
</head>

<body>

    <main class="">
        @yield('content')
    </main>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ url('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('painel/js/timer.js') }}"></script>
    <script src="{{ url('front-app/store/assets/js/script.js') }}"></script>
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
</body>

</html>
