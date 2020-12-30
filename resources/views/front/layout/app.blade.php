<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EVOTING</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="icon shortcut" href="{{ asset('image/logo-kpu.png') }}" sizes="16x16" type="image/png" />
        <link href="{{ asset('swal/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front') }}/style.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: #fff" class="pt-5 pt-xl-0 pt-md-0">
    <nav class="navbar navbar-expand-md navbar-light bg-putih shadow-sm fixed-top">
        <div class="container">
            <a class="judul" href="{{ url('/') }}">
                PILKETOS
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @if (session()->get('npm'))
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('front.dashboard') }}">Pemilihan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('front.hasil') }}">Hasil Suara</a>
                        </li>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ session()->get('name') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('front.logout') }}">Logout</a>
                            </div>
                        </div>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#tatacara">Tata Cara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#login">Masuk</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{ route('front.dashboard') }}">Masuk</a>
                    </li> --}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
  
    <script src="{{ asset('swal/dist/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });

    </script>
    {{-- @if (session('status'))
        <script type="text/javascript">
            Swal.fire({
                title: 'Sukses ...',
                icon: 'success',
                text: '{{ session('
                status ') }}',
                showClass: {
                    popup: 'animated bounceInDown slow'
                },
                hideClass: {
                    popup: 'animated bounceOutDown slow'
                }
            })

        </script>
    @endif --}}
    <script>
        const alertconfirmn = (url, name) => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '',
                text: "Yakin Memilih " + name + ' ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Pilih !',
                cancelButtonText: 'Tidak, Batalkan !',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.replace(url);
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            })
        }

    </script>
    @yield('js')
</body>

</html>
