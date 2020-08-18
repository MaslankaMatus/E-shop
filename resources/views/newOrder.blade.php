@extends('layouts.master')

@section('content')

<div class="container">
    <div class="content">
        <h1>NEW ORDER</h1>

    </div>
</div>

@auth
    <div class="container">
        @include('addOrder')
    </div>
@endauth

@endsection



