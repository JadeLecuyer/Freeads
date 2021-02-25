@extends('layouts.app')
  
@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2 class="m-0">Edit an ad</h2>
        <a class="btn btn-custom-secondary" href="{{ route('ads.index') }}"> Back</a>
    </div>
   
    @if ($errors->any())
            <ul class="list-group my-2">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
    @endif
   
    <form action="{{ route('ads.update',$ad->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group my-3">
            <label for="title" class="form-label">Your ad's title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $ad->title }}" required>
        </div>

        <div class="form-group my-3">
            <label for="description" class="form-label">Your ad's description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $ad->description }}</textarea>
        </div>

        <div class="form-group my-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control w-auto" value="{{ $ad->price }}" required>
        </div>

        <div class="form-group my-3">
            <label for="picture" class="form-label">Your ad's picture</label>
            <input type="file" name="picture" id="picture" class="form-control-file">
            <small class="form-text text-muted">The file must be a valid image format (jpg, jpeg, png, bmp, gif, svg, or webp) and be under 300ko.</small>
        </div>

        <div class="form-group my-3">
            <label for="category" class="form-label">Your ad's category</label>
            <select name="category" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category}}" @if($category == $ad->category) selected @endif >{{ $category}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $ad->location }}" required>
        </div>

        <button type="submit" class="btn btn-custom-secondary my-2">Submit</button>
    
    </form>
</div>
@endsection