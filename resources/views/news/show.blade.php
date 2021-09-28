@extends('layouts.app')

@section('content')
    <div class="card py-3 mt-3 border-0">
        <h2 class="card-title text-center">{{$news->title}}</h2>
        <div class="mx-auto text-center ">
            <div class="fb-share-button text-center m-auto my-4" data-href="{{Request::url()}}" data-layout="button_count" data-size="small">
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2Fnews%2Fshow%2F1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" style="margin:auto">Share</a>
            </div>
            <div class="mt-2">
                <a href="http://twitter.com/share?text=Im%20Sharing%20on%20Twitter&url={{Request::url()}}" class="twitter-share-button" data-show-count="false" style="height:100%">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <a target="_blank" href="https://web.whatsapp.com/send?text={{Request::url()}}" data-action="share/whatsapp/share" class="text=success"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" version="1.1" role="img" aria-labelledby="at-svg-whatsapp-1" class="at-icon at-icon-whatsapp" style="width: 32px; height: 32px;" title="WhatsApp" alt="WhatsApp"><title id="at-svg-whatsapp-1">WhatsApp</title><g><path d="M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z" fill-rule="evenodd"></path></g></svg></a>
            
        </div>

        @if (Auth::user() && Auth::user()->role == 'Admin')
        <div class="text-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form method="POST" action="/news/{{$news->id}}"style="display:inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-danger delete-user" value="Delete">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="/news/{{$news->id}}/edit" class="btn btn-warning col-1" >Edit</a>
            
        </div>
        @endif
        <div class="card-body text-center">
            @if($news->video != 'null')
                <x-embed url="{{$news->video}}"/>
            @endif
            <h5 class="card-title text-dark my-5">Views: {{$news->views}}, Created at: {{ date('j F, Y', strtotime($news->created_at)) }}</h5>      
            <p class="card-text text-dark my-5">{!! nl2br($news->content) !!}</p>      
            @if($news->image != 'null')
            <div class="m-auto text-center">
                <img style="width: 800px" src="/storage/images/{{$news->image}}" alt="">
            </div>
            @endif
        </div>
        <h3 class="card-header bg-white mb-4">{{$news->category->name}}</h3>
         <div class="row mx-auto">
            <div class="card-deck">
            @foreach ( $category['news']->slice(0, 3) as $new)
                <div class="card">
                    @if($new->image != 'null')
                        <a href="/news/show/{{$new->id}}"class=" text-dark news-header"><img class="card-img-top" src="/storage/images/{{$new->image}}"> </a>
                    @endif
                    <div class="card-body">
                    <h5 class="card-text text-dark"><a href="/news/show/{{$new->id}}" class="text-dark news-header">{{$new->title}} </a></h5>
                    <p class="card-text">{{ strlen($new->content) > 20 ? substr($new->content,0,70).'...' : $new->content }}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-body text-center mt-4">
            <h4 class="">Comments</h4>
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
            <div class="card-body p-3">
                <h6 class="card-title"> {{$comment->user->name}}</h6>
                <p class="card-text">{{$comment->comment}}</p>
                <small>{{ date('j F, Y', strtotime($comment->created_at)) }}</small>
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
        {{$comments->links()}}
    </div>
@endsection
