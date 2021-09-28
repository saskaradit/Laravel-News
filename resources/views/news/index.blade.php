@extends('layouts.app')

@section('content')
@isset($category)
    <h3 class="text-dark my-2">{{$category->name}} News</h3>
@endisset
    <div class="card-deck my-4">
    @foreach ( $news->slice(0, 3) as $new)
        <div class="card">
            @if($new->image != 'null')
                <a href="/news/show/{{$new->id}}"class=" text-dark news-header">   <img class="card-img-top" src="/storage/images/{{$new->image}}"> </a>
            @endif
            <div class="card-body">
            <h5 class="card-text text-dark"><a href="/news/show/{{$new->id}}" class="text-dark news-header">{{$new->title}} </a></h5>
            <p class="card-text">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    @endforeach
    </div>
    <div class="col-9">
        @foreach ($news->slice(3, 100) as $new)
        <div class="card mt-3 border-0">
            @if($new->image != 'null')
                <img class="card-img-top border-0" src="/storage/images/{{$new->image}}">
            @endif
                <h4 class="card-header bg-white"><a href="/news/show/{{$new->id}}"  class=" text-dark news-header"> {{$new->title}} </a></h4>
                <div class="card-body mb-5">
                    <p class="card-text text-dark">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}
                    </p>
                </div>
            </div>
        @endforeach
        {{$news->links()}}
    </div>
@endsection
