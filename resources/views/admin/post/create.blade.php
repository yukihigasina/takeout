@extends('layouts.admin')

@section('title', '投稿')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>テイクアウトできる飲食店を投稿する</h2>
                
                {{--送信先のurl--}}
                <form action="{{ action('Admin\PostController@store') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    
                    <div class="form-group row">
                        <label class="col-md-12">ニックネーム</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-12">お店の名前</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="storename" value="{{ old('storename') }}">
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-md-12">お店の場所</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-12">コメント</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12">画像</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
@endsection