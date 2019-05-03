@extends('layout')

@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body class='text-center'>
    
    <div class="mx-auto" style="width: 300px;">
        <div class="container">
            <div class="py-5 text-center">
                @isset($mesage)
                <p style="color:red">{{$message}}</p>
                @endisset

                <form name="loginform" action="/auth/login" method="post" class='form-signin'>
                    <!-- <img class="mb-4" src="../../images/Nyamosu-logo.png" alt="" width="72" height="72"> -->
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    {{csrf_field()}}
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email address" required="" autofocus="" size="30">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" type="password" name="password" size="30" class="form-control" placeholder="Password" required="">
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type='submit' name='action' value='send'>Sign in</button>
                    <p class="mt-5 mb-3 text-muted">© @kiyo-tomo</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

@endsection