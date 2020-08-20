@extends('layouts.master')

@section('content')

<div class="container">
    <div class="content">
        <h1>Edit User</h1>

    </div>
</div>

@auth
    <div class="container">

        @include('editUserForm')
    </div>
@endauth

@endsection



