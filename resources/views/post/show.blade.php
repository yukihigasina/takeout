@extends('layouts.front')

@section('title', '詳細')

@section('content')
     <link href="{{ secure_asset('css/show.css') }}" rel="stylesheet">
        <div class="menu-wrapper container">
            
            <p　class='showtitle'>店名   ～{{$storename}}～</p>
            <div class="row">
                
            @foreach($posts as $post)
            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <img class="card-img-top" src="{{ secure_asset('storage/image/'.$post->image_path) }}" >
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item　card-place">場所：{{$post->place}}</li>
                            <li class="list-group-item　card-text">コメント：{{$post->body}}</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
@endsection