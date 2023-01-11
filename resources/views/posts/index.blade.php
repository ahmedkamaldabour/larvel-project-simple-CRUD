@extends('layouts.app')
@section('title')
    All Posts
@endsection

@section('content')

    <div class="container">
        <div class="mt-5">
            {{--<a href="{{route('posts.create')}}" type="button" class="btn btn-success mb-2 ">Creat Post</a>--}}
            <a href="{{route('posts.create')}}" class="btn btn-success mb-2 ">Create Post</a>
            <table class="table ">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted BY</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            {{-- <a href="/posts/{{$post->id}}" type="button" class="btn btn-info">view</a>--}}
                            <a href="{{route('posts.show',['post'=> $post->id])}}" type="button"
                               class="btn btn-info">view</a>
                            <a href="{{route('posts.edit',['post'=> $post->id])}}" type="button"
                               class="btn btn-primary">Edit</a>
                            <form style="display: inline" action="{{route('posts.destroy',['post'=> $post->id])}}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
