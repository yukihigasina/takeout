@extends('layouts.admin')
@section('title', '投稿の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ url('admin/post/{$post}') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2>投稿の編集</h2>
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
                            <input type="text" class="form-control" name="name" value="{{ $post_form->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-12">お店の名前</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="storename" value="{{ $post_form->storename }}">
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-md-12">お店の場所</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="place" value="{{$post_form->place }}">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-12" for="body">コメント</label>
                        <div class="col-md-12">
                            <textarea class="form-control" name="body" rows="20">{{ $post_form->body }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-12" for="image">画像</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control-file" name="image" >
                            <div class="form-text text-info">
                                設定中: {{ $post_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $post_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection