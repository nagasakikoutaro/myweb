@extends('layouts.show')

@section('title', '札幌転職考え中')

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                 <h1>コメント一覧</h1>
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
                                <div class="body">
                                コメント-> 　　　{{ str_limit($comment->body, 150) }}
                                </div>
                            </div>
                        </div>
                    </div>    
                @endforeach
            <div class="comment" >
                <h2>コメント作成</h2>
                <form action="{{ action('ComentController@create')}}" method="post" enctype="multipart/form-data">

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
                    <input type="submit" class="btn btn-primary" value="投稿">
                    {{ $comments->links() }}
               </div>
        </form>
@endsection