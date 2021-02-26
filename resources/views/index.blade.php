@extends('layouts.app')

@section('content')
<div class="container">
    @include('searchbar')

    <div class="row row-cols-1 row-cols-lg-2 py-3">
        @each('card-ad', $ads, 'ad')
    </div>
    <div class="py-2">
        {!! $ads->links() !!}
    </div>
</div>
@endsection