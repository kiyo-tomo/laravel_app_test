@extends('layout')

@section('content')


@if (Auth::check())

<div class="mb-4" align="right">
    Hello! {{\Auth::user()->name}}さん<br />
    <a href="/auth/logout" class="btn btn-secondory">Logout</a>
</div>

<div class="mb-4" align="right">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">
        投稿を新規作成する
    </a>
</div>
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
                投稿日時 {{ $post->created_at->format('Y.m.d') }}
            </span>

            @if ($post->comments->count())
            <span class="badge badge-primary">
                コメント {{ $post->comments->count() }}件
            </span>
            @endif
        </div>
    </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mb-5">
    {{ $posts->links() }}
</div>

@else
<div class="container mt-4">
    Hello! ゲストさん<br />
    <a href="/auth/login" class="btn btn-secondory">Login</a><br />
    <a href="/auth/register" class="btn btn-secondory">会員登録</a>
</div>
@endif

@endsection