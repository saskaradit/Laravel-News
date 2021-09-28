@extends('layouts.app')

@section('content')
<div class="container">
    @if($headline)
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
                <h1 class="card-title text-center mt-2 mb-5 text-white headline"><a class="badge text-white" href="/news/show/{{$headline->id}}">{{$headline->title}}</a></h1>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-3">
            <h3 >Trending</h3>
            @foreach ($trends as $trend)
                <div class="card mt-3 bg-dark">
                    @if($trend->image != 'null')
                        <a href="/news/show/{{$trend->id}}"> <img class="card-img-top border-0" src="storage/images/{{$trend->image}}"></a>
                    @endif
                    <h6 class="card-header "><a href="/news/show/{{$trend->id}}" class=" text-white news-header">{{$trend->title}} </a><p class="text-muted">Views: {{$trend->views}}</p></h6>
                </div>
            @endforeach
        </div>
        <div class="col-9">
            <h3 class="">Recent News</h3>
            @foreach ($news as $new)
            <div class="card mt-3 border-0" >
                @if($new->image != 'null')
                   <a href="/news/show/{{$new->id}}"> <img class="card-img-top border-0" src="storage/images/{{$new->image}}"></a>
                @endif
                    <h4 class="card-header bg-white"><a href="/news/show/{{$new->id}}"  class=" text-dark news-header"> {{$new->title}} </a></h4>
                    <div class="card-body mb-5">
                        <p class="card-text text-dark">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}
                        </p>
                        <p class="card-text"><small class="text-muted">{{ date('j F, Y', strtotime($new->created_at)) }}</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mx-auto">
        @foreach ($categories as $cat)
            <div class="col-12">
                @if(!$cat->news->isEmpty())
                    <h4 class="card-header bg-white mb-4"><a href="/news/category/{{$cat->name}}"  class=" text-dark news-header"> {{$cat->name}} </a></h4>
                    <div class="card-deck">
                    @foreach ( $cat['news']->slice(0, 3) as $new)
                            <div class="card">
                                @if($new->image != 'null')
                                   <a href="/news/show/{{$new->id}}"class=" text-dark news-header">   <img class="card-img-top" src="storage/images/{{$new->image}}"> </a>
                                @endif
                                <div class="card-body">
                                <h5 class="card-text text-dark"><a href="/news/show/{{$new->id}}" class="text-dark news-header">{{$new->title}} </a></h5>
                                <p class="card-text">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}</p>
                                <p class="card-text"><small class="text-muted">{{ date('j F, Y', strtotime($new->created_at)) }}</small></p>
                                </div>
                            </div>
                    @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
