@extends('layouts.app')

@section('content')
    <div class="col-9">
            <h3 class="text-dark">{{$category->name}} News</h3>
            @foreach ($news as $new)
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
        </div>
@endsection
