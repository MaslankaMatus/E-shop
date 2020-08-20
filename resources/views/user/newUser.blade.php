@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="content">
            <h1>NEW User</h1>

        </div>
    </div>

    @auth
        <div class="container">
            @include('auth.register')
        </div>
    @endauth

@endsection



