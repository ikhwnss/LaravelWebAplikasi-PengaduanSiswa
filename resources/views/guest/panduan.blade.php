<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
        integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/css/landing.min.css') }}">

    <title>{{env('APP_NAME')}}</title>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="container navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <i class="fa fa-wallet"></i>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-primary"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-capitalize" href="{{route('register')}}">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize btn btn-outline-info" href="{{route('login')}}">Masuk</a>
                </ul>
            </div>
        </nav>
    </header>

    <section class="container" style="height: 80vh">
        <div class="row">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi iure nemo iste non officiis fugiat eveniet ad minima possimus magni, id, nihil soluta laboriosam, similique maiores in a doloremque voluptatum?
        </div>
    </section>

    <footer>
        <nav class="container navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <i class="fa fa-wallet"></i>
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link text-muted">&copy All right reserved {{date('Y')}}</a></li>
                </ul>
            </div>
        </nav>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
