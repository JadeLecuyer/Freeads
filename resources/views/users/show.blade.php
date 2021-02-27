@extends('layouts.app')
 
@section('content')
<div class="container">

<div class="mb-3 d-flex justify-content-between">
    @if(Auth::user()->admin && Auth::user()->id !== $user->id)
        <a class="btn btn-custom-secondary" href="{{ route('users.index') }}">Back</a>
    @endif

    @if(Auth::user()->admin || Auth::user()->id === $user->id)
        <div class="d-flex">
            <a class="btn btn-success mr-2" href="{{ route('users.edit',$user->id) }}">Edit</a>
            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-custom-primary">Delete</button>
            </form>
        </div>
    @endif
</div>

    <h3 class="my-3">Profile</h3>

    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif
    
    <div class="row">
        <div class="col-12 col-sm-9 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0">Contact info</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div><span class="card-text font-weight-bold">Login</span> : {{ $user->login }}</div>
                        <div><span class="card-text font-weight-bold">Nickname</span> : {{ $user->nickname }}</div>
                    </div>
                    <div class="">
                        <div><span class="card-text font-weight-bold">Email</span> : {{ $user->email }}</div>
                        <div><span class="card-text font-weight-bold">Phone</span> : {{ $user->phone }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <p class="my-3"><span class="font-weight-bold">Date of registration</span> : {{ date_format($user->created_at, 'dS F Y') }}</p>

    @if(Auth::user()->admin)
        <p class="text-muted">{{ $user->admin ? 'This user is an administrator' : 'This user is not an administrator' }}</p>
    @endif

</div>
@endsection
