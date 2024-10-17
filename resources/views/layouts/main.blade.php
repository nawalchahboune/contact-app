<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'my contacts')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href={{ asset('css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('css/custom.css') }} rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="/">
                <strong>Contact</strong> App
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-toggler">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="#" class="nav-link">Companies</a></li>
                        <li class="nav-item active"><a href="#" class="nav-link">Contacts</a></li>
                    </ul>


                @endauth
                <ul class="navbar-nav ml-auto">
                    @if (!Auth::check())
                        <li class="nav-item mr-2"><a href="{{ route('login') }}"
                                class="btn btn-outline-secondary">Login</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('register') }}"
                                class="btn btn-outline-primary">Register</a>
                        </li>
                    @endif

                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('login') }}" id="navbarDropdownMenuLink"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <!-- drop down menuuuu-->

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href={{ route('settings') }}> Settings </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </div>

                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <!--content-->



    <script src={{ asset('js/jquery.min.js') }}></script>
    <script src={{ asset('js/popper.min.js') }}></script>
    <script src={{ asset('js/bootstrap.min.js') }}></script>

</body>

</html>
