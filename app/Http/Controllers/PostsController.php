<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;    #追加


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_name' => 'required|max:50',
            'user_id' => 'required|exists:users,id',
            'image_url' => [
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        // Postモデルのインスタンスを作成する
        $post = new Post();
        // タイトル
        $post->title = $request->title;
        //コンテンツ
        $post->body = $request->body;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        $post->user_name = $request->user_name;

        $path = "app/" . $request->file('image_url')->store('public/images');
        $post->image_url = basename($path);

        // インスタンスの状態をデータベースに書き込む
        $post->save();

        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
        return redirect()->route(
            'top',
            [
                'id' => $post->id,
            ]
        );
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);
        $user = Auth::user();   #ログインユーザー情報を取得

        return view(
            'posts.show',
            ['post' => $post,],
            ['user' => $user]
        );
    }

    public function edit($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update($post_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
            'user_name' => 'required|max:50',
        ]);
        $post = Post::findOrFail($post_id);
        $post->fill($params)->save();

        return redirect()->route('posts.show', ['post' => $post]);
    }

    public function destroy($post_id)
    {
        $post = Post::findOrFail($post_id);

        \DB::transaction(function () use ($post) {
            $post->comments()->delete();
            $post->delete();
        });

        return redirect()->route('top');
    }
}
