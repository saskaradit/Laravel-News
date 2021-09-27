@extends('layouts.app')

@section('content')
    <h1 class="text-dark mb-3">Select Headline</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <select class="custom-select mb-3" aria-label="Default select example" name="news">
            @foreach ($news as $key=>$new)
            <option value="{{$new->id}}" class="text-dark special">{{$new->title}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-light">Change Headline</button>
    </form>
@endsection