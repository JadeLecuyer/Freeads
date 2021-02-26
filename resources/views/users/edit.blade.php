@extends('layouts.app')
  
@section('content')
<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h2 class="m-0">Edit an user's profile</h2>
        <a class="btn btn-custom-secondary" href="{{ route('users.index') }}"> Back</a>
    </div>
   
    @if ($errors->any())
            <ul class="list-group my-2">
                @foreach ($errors->all() as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                @endforeach
            </ul>
    @endif
   
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="form-group my-3">
            <label for="login" class="form-label">User's login</label>
            <input type="text" name="login" id="login" class="form-control" value="{{ $user->login }}" required>
        </div>

        <div class="form-group my-3">
            <label for="nickname" class="form-label">User's nickname</label>
            <input type="text" name="nickname" id="nickname" class="form-control" value="{{ $user->nickname }}" required>
        </div>

        <div class="form-group my-3">
            <label for="email" class="form-label">User's email address</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group my-3">
            <label for="phone" class="form-label">User's phone number</label>
            <input type="tel" name="phone" id="phone" class="form-control w-auto" value="{{ $user->phone }}" required>
        </div>

        <button type="submit" class="btn btn-custom-secondary my-2">Submit</button>
    
    </form>
</div>
@endsection