@extends('layout')

@section('content')

@if (Auth::check())
<main role="main" class="container">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Nyamosu BBS</h1>
            <p class="lead text-muted">Nyamosu BBSはシンプルな掲示板です。</p>
        </div>
    </section>
</main>

<div class="container mt-4">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-text">
                {!! nl2br(e(str_limit($post->body, 200))) !!}
            </p>

            <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                続きを読む
            </a>
        </div>
        <div class="card-footer">
            <span class="mr-2">
                投稿日時 {{ $post->created_at->format('Y.m.d') }} ({{$post->user_name}})
            </span>

            @if ($post->comments->count())
            <span class="badge badge-primary">
                コメント {{ $post->comments->count() }}件
            </span>
            @endif

            <!-- <span class="badge badge-primary">
                投稿者名 {{$post->name}}
            </span> -->
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>

@else
<main role="main" class="container">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Nyamosu BBS</h1>
            <p class="lead text-muted">Nyamosu BBSはシンプルな掲示板です。</p>
            <p class="lead text-muted">ログインもしくは会員登録を以下からしてください。</p>
            <p class="lead text-muted">ログインすることで投稿の作成、投稿へのコメントが可能になります。</p>
            <p>
                <a class="btn btn-primary my-2" href="/auth/login" role="button">Login »</a>
                <a class="btn btn-secondary my-2" href="/auth/register" role="button">会員登録 »</a>
            </p>
        </div>
    </section>
</main>

<div class="container mt-4">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            {{ $post->title }}
        </div>
        <div class="card-body">
            <p class="card-text">
                {!! nl2br(e(str_limit($post->body, 200))) !!}
            </p>

            <a class="card-link" href="{{ route('posts.show', ['post' => $post]) }}">
                続きを読む
            </a>
        </div>
        <div class="card-footer">
            <span class="mr-2">
                投稿日時 {{ $post->created_at->format('Y.m.d') }} ({{$post->user_name}})
            </span>

            @if ($post->comments->count())
            <span class="badge badge-primary">
                コメント {{ $post->comments->count() }}件
            </span>
            @endif

            <!-- <span class="badge badge-primary">
                投稿者名 {{$post->name}}
            </span> -->
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>

<!-- <div align="center">
    <h1 class="h3 mb-3 font-weight-normal">Hello! ゲストさん</h1>
    <a href="/auth/login" class="btn btn-secondory">Login</a><br />
    <a href="/auth/register" class="btn btn-secondory">会員登録</a>
</div> -->
@endif

@endsection