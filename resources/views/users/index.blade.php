@extends('layouts.app')
 
@section('content')
<div class="container">
        <div class="d-flex justify-content-between mb-3">
                <h2 class="m-0">Hello {{ Auth::user()->nickname }}</h2>
                <!-- <a class="btn btn-custom-secondary" href="{{ route('users.create') }}"> Create new user</a> -->
        </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

   <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>e-mail</th>
                <th>Nickname</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->nickname }}</td>
                <td>{{ ($user->admin) ? 'ADM' : '' }}</td>
                <td class="d-flex">
                    <a class="btn btn-custom-secondary mr-2" href="{{ route('users.show',$user->id) }}">See</a>
                    <a class="btn btn-success mr-2" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
        
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="btn btn-custom-primary">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
  
    {!! $users->links() !!}

</div>
      
@endsection