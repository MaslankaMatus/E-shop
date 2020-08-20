@extends('layouts.master')

@section('content')

<div class="container">
    <div class="content">
        <h1>Edit ORDER</h1>

    </div>
</div>

@auth
    <div class="container">

        @include('order.edit')
    </div>
@endauth

@endsection



