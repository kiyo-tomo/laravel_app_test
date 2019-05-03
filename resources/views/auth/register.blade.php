@extends('layout')

@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body class='text-center'>
    <div class="mx-auto" style="width: 300px;">
        <div class="py-5 text-center">
            <!-- <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
            <h2>会員登録フォーム</h2>
            <p class="lead text-muted">以下に必要事項を入力してください。入力したメールアドレスに登録完了通知が送信されます。</p>
        </div>

        <form name="registform" action="/auth/register" method="post" class='form-signin'>
            <!-- <img class="mb-4" src="../../images/Nyamosu-logo.png" alt="" width="72" height="72"> -->
            <!-- <h1 class="h3 mb-3 font-weight-normal">会員登録</h1> -->
            {{csrf_field()}}
            <label for="inputYourName" class="sr-only">Your name</label>
            <input type="text" name="name" class="form-control" placeholder="Your Name" required="" autofocus="" size="30"><span>{{ $errors->first('name') }} </span>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email address" required="" autofocus="" size="30"><span>{{ $errors->first('email') }} </span>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" type="password" name="password" size="30" class="form-control" placeholder="Password" required=""><span>{{ $errors->first('password') }} </span>
            <label for="inputPasswordConfirm" class="sr-only">Password</label>
            <input type="password" type="password" name="password_confirmation" size="30" class="form-control" placeholder="Password(Confirm)" required=""><span>{{ $errors->first('password_confirmation') }} </span>
            
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type='submit' name='action' value='send'>ユーザ登録</button>
            <p class="mt-5 mb-3 text-muted">© @kiyo-tomo</p>
        </form>

        <!-- <h1>ユーザ登録フォーム</h1>
        <form name="registform" action="/auth/register" method="post">
            {{csrf_field()}}
            名前：<input type="text" name="name" size="30"><span>{{ $errors->first('name') }} </span><br />
            メールアドレス：<input type="text" name="email" size="30"><span>{{ $errors->first('email') }} </span><br />
            パスワード：<input type="password" name="password" size="30"><span>{{ $errors->first('password') }} </span><br />
            パスワード(確認)：<input type="password" name="password_confirmation" size="30"><span>{{ $errors->first('password_confirmation') }} </span><br />
            <button type='submit' name='action' value='send'>送信</button>
        </form> -->

    </div>
</body>

</html>

@endsection