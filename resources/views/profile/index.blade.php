@extends('layouts.front')

@section('title', '札幌市の転職活動中の人の集まり')

@section('content')
 <a href="{{ action('ProfileController@add')}}">プロフィールを作成する</a>
 <div class="container">
      <div class="row">
        <div class="posts col-md-8 mx-auto mt-3">
        <h1>プロフィール一覧</h1>
        @foreach ($posts as $post)
         <div class="image col-md-6 text-right mt-4">
        　　@if ($post->image_path)
            　　<img src="{{ ($post->image_path) }}">
        　　@endif
        　　</div>
            <p><span>{{ $post->name }}</span> / <time>{{ $post->updated_at->format('Y年m月d日') }}</time>/<gender>　{{ ($post->gender) }}</gender>/<age>　{{ ($post->age) }}歳</age></p>
            <div class="job">
                目指す職種->　{{ str_limit($post->job) }}
            </div>
            <div class="introduction">
                自己紹介など->  {{ str_limit($post->introduction) }}
            </div>
            <div>
                <a href="{{ action('ProfileController@edit', ['id' => $post->id]) }}">プロフィールを編集</a>
            </div>
            <div>
                <a href="{{ action('ProfileController@delete', ['id' => $post->id]) }}">プロフィールを削除</a>
            </div>
            <div>
                <a href="{{ action('ProfileController@show', ['id' => $post->id]) }}">コメントする</a>
            </div>
            <hr color="#c0c0c0">
        @endforeach
        </div>
    </div>
</div>
@endsection