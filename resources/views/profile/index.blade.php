@extends('layouts.front')

@section('title', '札幌転職考え中')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                 <h2>札幌市転職</h2>
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                                </div>
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                名前->   　　{{ str_limit($post->name, 150) }}
                                </div>
                                <div class="gender">
                                性別-> 　　　{{ str_limit($post->gender, 150) }}
                                </div>
                                <div class="age">
                                年齢->   　　{{ str_limit($post->age, 150) }}
                                </div>
                                <div class="job">
                                目指す職種->　{{ str_limit($post->job, 150) }}
                                </div>
                                 <div class="introduction">
                                自己紹介など->  {{ str_limit($post->introduction,150) }}
                                </div>
                                 <div>
                                    <a href="{{ action('ComentController@index', ['id' => $post->id]) }}">コメント一覧</a>
                                </div>
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