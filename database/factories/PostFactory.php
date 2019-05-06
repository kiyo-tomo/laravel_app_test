# database/migrations/PostFactory.php

<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;    #追加


$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => '投稿のタイトル',
        'body' => "本文です。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。\nテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト。",
        'name' => Auth::user()->name,
        'user_id' => Auth::id()
    ];
});