@extends('layouts.app')
 
@section('content')
<div class="container">

    @if(Auth::user()->admin)
        <div class="mb-3">
            <a class="btn btn-custom-secondary" href="{{ route('users.index') }}">Back</a>
        </div>
    @endif

    <h3>Profile</h3>
    <p>Login : {{ $user->login }}</p>
    <p>Nickname : {{ $user->nickname }}</p>
    <p>Email : {{ $user->email }}</p>
    <p>Phone : {{ $user->phone }}</p>
    @if(Auth::user()->admin)
        <p>{{ $user->admin ? 'This user is an administrator' : 'This user is not an administrator' }}</p>
    @endif
    <p>Date of registration : {{ date_format($user->created_at, 'dS F Y') }}</p>

    @if(Auth::user()->admin || Auth::user()->id === $user->id)
        <a class="btn btn-success mr-2" href="{{ route('users.edit',$user->id) }}">Edit</a>
    @endif

</div>
@endsection
