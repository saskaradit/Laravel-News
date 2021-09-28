@extends('layouts.app')

@section('content')
    <h1 class="text-white mb-3">Create Articles</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" placeholder="Input title"  class="form-control">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="category">
            @foreach ($categories as $key=>$category)
            <option value="{{$key}}" class="text-dark">{{$category}}</option>
            @endforeach
        </select>
        <div class="mb-3">
            <input type="text" name="video" placeholder="Input url youtube"  class="form-control">
        </div>
        
        <div class="mb-3">
            <textarea class="form-control" placeholder="Write your story" style="height: 200px" name="content"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-dark">Create</button>
    </form>
@endsection
