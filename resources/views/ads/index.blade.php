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

    @if (Auth::user()->admin)
    <div class="my-2">
        <form action="{{ route('ads.index') }}" method="GET">
            <div class="row justify-content-end">
                <div class="col-9 col-md-3">
                    <select name="ads" id="ads" class="form-control">
                        <option value="" {{ (request('ads') === '') ? 'selected' : '' }}>See all ads</option>
                        <option value="myads" {{ (request('ads') === 'myads') ? 'selected' : '' }}>See my ads</option>
                    </select>
                </div>
                <div class="col-3 col-md-1">
                    <button type="submit" class="btn btn-custom-secondary">See</button>
                </div>
            </div>
        </form>
    </div>
    @endif

   <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Seller</th>
                <th>Action</th>
            </tr>
            @foreach ($ads as $ad)
            <tr>
                <td>{{ $ad->title }}</td>
                <td>{{ $ad->category }}</td>
                <td>{{ $ad->price }}</td>
                <td>{{ $ad->login }}</td>
                <td class="d-flex">
                    <a class="btn btn-custom-secondary mr-2" href="{{ route('ads.show',$ad->id) }}">See</a>
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