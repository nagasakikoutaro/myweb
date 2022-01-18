@extends('layouts.front')

@section('title', '個人ページ')

@section('content')
 <div class="container">
    <h1>{{$profile->name}}さんのページ</h1>
        <div class="image col-md-6 text-right mt-4">
        　　@if ($profile->image_path)
            　　<img src="{{ $profile->image_path }}">
        　　@endif
        </div>
            <p><span>{{ $profile->name }}</span> / <time>{{ $profile->updated_at->format('Y年m月d日') }}</time>/<gender>　{{ ($profile->gender) }}</gender>/<age>　{{ ($profile->age) }}歳</age></p>
            <div class="job">
                目指す職種->　{{ str_limit($profile->job, 150) }}
            </div>
            <div class="introduction">
                自己紹介欄、悩み、知りたいことなど->  {{ str_limit($profile->introduction,150) }}
            </div>
                
        <form action="{{ action('ComentController@store')}}"  method="post" enctype="multipart/form-data">
             @csrf
                 <input type="hidden" class="form-control" name="profile_id" value="{{  $profile->id }}">
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">名前</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ old('neme') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="body" rows="2">{{ old('body') }}</textarea>
                    </div>
                </div>
                    {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="コメントを投稿">
            </form>
            <h2>コメント一覧</h2>
              @forelse ($profile->coments as $comment)
             <div class="name">
                名前->   　　{{ str_limit($comment->name, 10) }}
            </div>
            <div class="body">
                コメント-> 　　　{{ str_limit($comment->body, 150) }}
            </div>
            @empty
            <p>コメントはまだありません。</p>
            @endforelse
        </div>
    </div>
@endsection