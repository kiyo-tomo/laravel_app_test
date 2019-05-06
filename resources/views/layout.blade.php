<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


    @if (Auth::check())

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand " href="/">Nyamosu BBS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav mr-auto">　
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">About</a>
                    </li> -->
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('posts.create') }}" class="nav-link">
                            投稿を新規作成する
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{\Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/auth/logout">Logout</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/auth/register">Register</a>
                    </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li> -->

                </ul>

            </div>
        </div>
    </nav>

    @else

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand " href="/">Nyamosu BBS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav mr-auto">　
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">About</a>
                    </li> -->
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ゲストさん
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/auth/register">Register</a>
                            <a class="dropdown-item" href="/auth/login">Login</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/register">会員登録</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="/auth/login">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    @endif

    <div>
        @yield('content')
    </div>

    <!-- jQuery読み込み -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- PopperのJS読み込み -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>