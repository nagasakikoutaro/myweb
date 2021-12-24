
@extends('layouts.profile')


@section('title', 'MyProfile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
                <form action="{{ action('ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">プロフィール画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label class="col-md-2">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢(age)</label>
                        <div class="col-md-10">
                        <input type="text" class="form-control" name="age" value="{{ old('age') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">職種(job)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="job" value="{{ old('job') }}">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="5">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                     <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
　