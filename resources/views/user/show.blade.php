@extends('layouts.app')

@section('content')
            <div class="card mt-3">
                <h4 class="card-header bg-white">{{$user->name}}</h4>
                <div class="card-body">
                    <p class="card-text text-dark">{{$user->email}}</p>
                    <p class="card-text text-dark">{{$user->phonenumber}}</p>
                    <p class="card-text text-dark">{{$user->role }}</p>
                    <p class="card-text text-dark">{{$user->image}}</p>
                    <a href="/users/edit/{{Auth::user()->id}}" class="btn btn-warning col-1" >Edit</a>
                </div>
            </div>
     
@endsection
