@extends('layouts.show')

@section('title', '札幌転職考え中')

@section('content')
  <div class="container">
        <h2>コメント一覧</h2>
                <div class="post">
                    <div class="date">
                        {{ $comment->updated_at->format('Y年m月d日') }}
                    </div>
                    <div class="name">
                    　　名前->   　　{{ str_limit($comment->name, 150) }}
                    </div>
                    <div class="body">
                        コメント内容-> 　　　{{ str_limit($comment->body, 150) }}
                    </div>
                    </div>
                    @empty($comment)
                        コメントはまだありません。
                    @endempty
  </div>  
@endsection