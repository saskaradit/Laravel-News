@extends('layouts.app')

@section('content')
@foreach ($users as $user)
            <div class="card py-3 mt-3">
                <h4 class="card-header "><a href="/users/{{$user->id}}"  class="news-header"> {{$user->name}} </a></h4>
              
                <div class="card-body">
                    <p class="card-text text-dark">{{$user->email}}</p>

                        <p class="card-text text-dark">{{$user->phonenumber}}</p>

                            <p class="card-text text-dark">{{$user->role }}</p>

                                <p class="card-text text-dark">{{$user->image}}</p>

                    
                </div>
            </div>
            @endforeach
@endsection
