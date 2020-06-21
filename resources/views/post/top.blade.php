@extends('layouts.front')

@section('title', 'top')


@section('content')

    <header>
        <div class="container">
            <div class="header-title-area">
                <h1 class="logo">テイクアウトできる飲食店</h1>
                <p class="text-sub">最近テイクアウトを始めた飲食店も探せます。</p>
            </div>
        </div>
    </header>
        
    <div class="main">
        <div class="container">
            <div class="left-contents">
                <div class="card-contents-left">
                    <h2 class="text-title">お店の名前一覧</h2>
                    
                     <ul>
                     @foreach($posts as $post)
                      
                        <li><a href="{{ route('show',['storename' => $post->storename]) }}">{{ $post->storename }}</a></li>
                    
                    @endforeach
                    </ul>
                    
                </div>
            </div>
            <div class="right-contents">
                <div class="card-contents rightup">
                    <a href="{{ action('Admin\PostController@create') }}" class="btn btn-regi">投稿する</a>
                </div>
                <div class="card-contents">
                    <h2 class="text-title">更新情報(新着情報５件表示)</h2>
                    <div class="new">
                    @foreach($news as $new)
                    @if($loop->iteration<6)
                    <a href="{{route('show',['storename' => $new->storename])}}">
                    <div class="card-columns-new">
                        <div class="card" >
                            <img class="card-img-top" src="{{ secure_asset('storage/image/'.$new->image_path) }}" >
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item　card-place">店名：{{$new->storename}}</li>
                                    <li class="list-group-item　card-place">場所：{{$new->place}}</li>
                                    <li class="list-group-item　card-text">コメント：{{$new->body}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    </a>
                    @endif
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <footer>
        <div class="container">
        <p class="copyright">免責事項</p>
        </div>
    </footer>
@endsection