@extends('layouts.admin')
@section('title', '投稿履歴')

@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿履歴一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\PostController@create') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\PostController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">お店の名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_storename" value="{{ $cond_storename }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">店名</th>
                                <th width="20%">場所</th>
                                <th width="30%">コメント</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{ $post->id }}</th>
                                    <td>{{ \Str::limit($post->storename, 100) }}</td>
                                    <td>{{ \Str::limit($post->place, 100) }}</td>
                                    <td>{{ \Str::limit($post->body, 250) }}</td>
                                <td>
                                <div>
                                    <a href="{{ action('Admin\PostController@edit', ['id' => $post->id]) }}" >
                                        <input type="submit" value="更新"/>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="削除"/>
                                    </form>

                                </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection