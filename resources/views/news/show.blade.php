@extends('layouts.app')

@section('content')
    <div class="card py-3 mt-3 border-0">
        <h2 class="card-title text-center">{{$news->title}}</h2>
        @if (Auth::user() && Auth::user()->role == 'Admin')
        <div class="text-center">
            <a href="/news/{{$news->id}}/edit" class="btn btn-warning col-1" >Edit</a>
            <form method="POST" action="/news/{{$news->id}}"style="display:inline">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                    <input type="submit" class="btn btn-danger delete-user col-1" value="Delete">
            </form>
        </div>
        @endif
        <div class="card-body text-center">
            @if($news->video != 'null')
                <x-embed url="{{$news->video}}"/>
            @endif
            <p class="card-text text-dark my-5">{{$news->content}}</p>      
            @if($news->image != 'null')
            <div class="m-auto text-center">
                <img style="width: 800px" src="/storage/images/{{$news->image}}" alt="">
            </div>
            @endif
        </div>
        <div class="card-body text-center">
            <h5 class="">Comments</h5>
            @guest
            <a class="px-4 btn btn-dark my-3 text-center" href="/login">Sign Up to Comment</a>
            @endguest
        </div>
        @if(!Auth::guest())
        <form action="" method="POST" class="px-4 col-4 mx-auto">
            @csrf
            <div class="mb-5 text-center">
                <input type="text" name="comment" placeholder="Input Comment"  class="form-control mb-2">
                <button type="submit" class="btn btn-dark text-center">Post</button>
            </div>
        </form>
        @endif
        @foreach ($comments as $comment)
        <div class="card mb-3 mx-3 mx-auto" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-title"> {{$comment->user->name}}</h6>
                <p class="card-text">{{$comment->comment}}</p>
            </div>
            @if (Auth::user() && Auth::user()->role == 'Admin')
                <form method="POST" action="/news/comments/{{$comment->id}}" class="mx-auto">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger m-2" value="Delete">
                </form>
        @endif
        </div>
        @endforeach
    </div>
@endsection
