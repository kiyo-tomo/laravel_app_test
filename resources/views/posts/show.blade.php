@extends('layout')

@section('content')

@if (Auth::check())

<div class="container mt-4">

    <!-- ログインユーザーが投稿者の場合編集と削除ボタンを表示する -->
    @if ($user->id == $post->user_id)
    <div class="mb-4 text-right">
        <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post]) }}">
            編集する
        </a>

        <form style="display: inline-block;" method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
            @csrf
            @method('DELETE')

            <input type="submit" value="削除" class="btn btn-danger" onclick='return confirm("本当に投稿を削除しますか？");'>

        </form>
    </div>
    @else
    @endif


    <div class="border p-4">
        <h1 class="h5 mb-4">
            {{ $post->title }} ({{ $post->user_name }})
        </h1>

        <p class="mb-5">
            {!! nl2br(e($post->body)) !!}
        </p>

        @if ($post->image_url)
        <p>画像：<img src="/storage/post_images/{{ $post->image_url }}"></p>
        {{ $post->image_url }}
        @endif

        <!-- Post Comment -->
        <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf

            <input name="post_id" type="hidden" value="{{ $post->id }}">
            <input type="hidden" name="name" value="{{\Auth::user()->name}}">

            <div class="form-group">
                <label for="body">
                    本文
                </label>

                <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
                @endif

            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    コメントする
                </button>
            </div>
        </form>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            @forelse($post->comments as $comment)
            <div class="border-top p-4">
                <time class="text-secondary">
                    {{ $comment->created_at->format('Y.m.d H:i') }} ({{$comment->name}})
                </time>
                <p class="mt-2">
                    {!! nl2br(e($comment->body)) !!}
                </p>
            </div>
            @empty
            <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>
@else
<div class="container mt-4">
    <div class="border p-4">
        <h1 class="h5 mb-4">
            {{ $post->title }}
        </h1>

        <p class="mb-5">
            {!! nl2br(e($post->body)) !!}
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

            @forelse($post->comments as $comment)
            <div class="border-top p-4">
                <time class="text-secondary">
                    {{ $comment->created_at->format('Y.m.d H:i') }} ({{$comment->name}})
                </time>
                <p class="mt-2">
                    {!! nl2br(e($comment->body)) !!}
                </p>
            </div>
            @empty
            <p>コメントはまだありません。</p>
            @endforelse
        </section>
    </div>
</div>
@endif

<script>
    function deleteClickEvent() {
        confirm("本当に投稿を削除しますか？")
    }
</script>

@endsection