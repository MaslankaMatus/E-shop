@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--                    <div class="card-header">{{auth()->user()->name}}</div>--}}
                    {{--                        {{$name}}--}}
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">

            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">File</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
{{--            <code>  {{$orders}}</code>--}}
{{--                            @dump(auth()->user()->hasRole('user'))--}}
            {{--                @dump(auth()->user()->hasRole('admin'))--}}

            @foreach( $orders as $order)
                @if (auth()->user()->hasRole('admin'))
                    <tr :order-data="{{ $order }}">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->file }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('orders.edit', [$order->id]) }}">EDIT</a></td>
                        <td>
                            {{ Form::open(array('url' => 'orders/' . $order->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @elseif (auth()->user()->hasRole('user'))

                    @can('view', $order)
{{--                        <code>  {{$order}}</code>--}}

                        <tr :order-data="{{ $order }}">
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->file }}</td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('orders.edit', [$order->id]) }}">EDIT</a></td>
                            <td>
                                {{ Form::open(array('url' => 'orders/' . $order->id, 'class' => 'pull-right')) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                                {{ Form::close() }}

                                {{--                            <i class="fa fa-trash" aria-hidden="true"></i>--}}
                                {{--                            install: composer require laravelcollective/html--}}

                            </td>
                        </tr>
                    @endcan
                @endif
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
