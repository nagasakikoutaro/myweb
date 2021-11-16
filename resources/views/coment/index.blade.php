@extends('layouts.front')

@section('title', 'コメント')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                 <h2>コメント一覧</h2>
                 <a href="{{ action('Content\ComentController@create') }}">コメントする</a>
                @foreach($comments as $comment)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $comment->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                名前->   　　{{ str_limit($comment->name, 150) }}
                                </div>
                                <div class="gender">
                                コメント-> 　　　{{ str_limit($comment->body, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection