@extends('layouts.coment')
@section('title', 'コメント作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント作成</h2>
                <form action="{{ action('Content\ComentController@create')}}" method="post" enctype="multipart/form-data">

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
                        <label class="col-md-2">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                    <a href="{{ action('ProfileController@index') }}">プロフィール一覧を見る</a>
                </form>
            </div>
        </div>
    </div>
@endsection

public function show(Request $request)
    {
        $id = $request-> id;
        $posts = Coment::findOrFail($id);
        dd($coments);
 
        return view('profile.show', [ 'posts' => $posts]);
    