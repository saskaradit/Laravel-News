@extends('layouts.app')

@section('content')
    <h1 class="text-white">Edit News</h1>   
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" value="{{$news->title}}" class="form-control">
        </div>
        <select class="form-select mb-3" aria-label="Default select example" name="category">
            <option value="1" class="text-dark">Beach</option>
            <option value="2" class="text-dark">Mountain</option>
            <option value="3" class="text-dark">Etc</option>
        </select>

        <div class="mb-3">
            <textarea class="form-control" style="height: 200px" name="content">{{$news->content}}</textarea>
        </div>
        <div class="mb-3">
            <input type="text" name="video" placeholder="Input url youtube"  class="form-control" value="{{$news->video}}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
    </form>
@endsection