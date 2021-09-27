@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <div class="thumbnail">
                <div class="headline-bg" ></div>
                    <a href="/news/show/{{$headline->id}}" class="text-white">
                        <h4 class="text-white text-center">Headline</h4>
                        @if($headline->image != 'null')
                            <img src="storage/images/{{$headline->image}}" alt="Lights" style="width:100%">
                            @endif
                    </a>
            </div>
            <h1 class="card-title text-center mt-2 mb-5 text-white"><a class="badge text-white" href="/news/show/{{$headline->id}}">{{$headline->title}}</a></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <h3 class="">Trending</h3>
            @foreach ($trends as $trend)
                <div class="card mt-3 bg-dark">
                    <h6 class="card-header "><a href="/news/show/{{$trend->id}}" class=" text-white news-header">{{$trend->title}} </a><p class="text-muted">Views: {{$trend->views}}</p></h6>
                </div>
            @endforeach
        </div>
        <div class="col-9">
            <h3 class="">Recent News</h3>
            @foreach ($news as $new)
            <div class="card mt-3 border-0">
                @if($new->image != 'null')
                    <img class="card-img-top border-0" src="storage/images/{{$new->image}}">
                @endif
                    <h4 class="card-header bg-white"><a href="/news/show/{{$new->id}}"  class=" text-dark news-header"> {{$new->title}} </a></h4>
                    <div class="card-body mb-5">
                        <p class="card-text text-dark">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
