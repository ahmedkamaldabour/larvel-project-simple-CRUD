@extends('layouts.app')


@section('title')
    Update {{$post->title}} Post
@endsection

@section('content')
    <div class="container">
        <div class="mt-5">
            <h1>Update Post</h1>
            <form method="post" action="{{route('posts.update',['post'=> $post->id])}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                           value="{{$post->title}}" placeholder="Enter the titles">
                </div>
                <div class="form-group mt-2">
                    <label for="exampleFormControlTextarea1"> Description </label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                              rows="3">{{$post->description}}</textarea>
                </div>
                <div class="form-group" id="exampleForm" id=" exampleFormControlInput1">
                    <label for="exampleFormControlSelect1">Select User</label>
                    <select class="form-control" name="user_id" id="exampleFormControlSelect1">
                        @foreach($users as $user)
                            <option value="{{$user->id}}"
                                    @if ($user->id == $post->user_id)
                                        selected
                                    @endif
                            >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
            <a href="{{route('posts.index')}}" class="btn btn-primary mt-2">Back TO All Posts</a>
        </div>
    </div>

@endsection
