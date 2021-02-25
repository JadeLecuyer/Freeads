@extends('layouts.app')
 
@section('content')
<div class="container">
        <div class="d-flex justify-content-between mb-3">
                <h2 class="m-0">Hello {{ Auth::user()->nickname }}</h2>
                <a class="btn btn-custom-secondary" href="{{ route('ads.create') }}"> Create new ad</a>
        </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

   <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            @foreach ($ads as $ad)
            <tr>
                <td>{{ $ad->title }}</td>
                <td>{{ $ad->category }}</td>
                <td>{{ $ad->price }}</td>
                <td class="d-flex">
                    <a class="btn btn-success mr-2" href="{{ route('ads.edit',$ad->id) }}">Edit</a>
                    <form action="{{ route('ads.destroy',$ad->id) }}" method="POST">
        
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-custom-primary">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
  
    {!! $ads->links() !!}

</div>
      
@endsection