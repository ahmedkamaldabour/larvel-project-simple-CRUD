@extends('layouts.app')


@section('title')
    {{$post->title}} Post
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <div class="card">
                <div class="card-header">
                    Post Info
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>ID :- </b>{{$post->id}}</h5>
                    <h5 class="card-title"><b>Title :- </b>{{$post->title}}</h5>
                    <h5 class="card-title"><b>Description :- </b>{{$post->description}}</h5>
                </div>
            </div>
            {{--button to go back to the index page--}}
            <a href="{{route('posts.index')}}" class="btn btn-primary mt-2">Back TO All Posts</a>
        </div>
    </div>
@endsection
