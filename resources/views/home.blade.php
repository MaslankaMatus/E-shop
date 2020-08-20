@extends('layouts.master')

@section('content')
    <div class="container">
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
                @if (auth()->user()->hasRole('admin'))
                    <th scope="col">User</th>
                @endif
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach( $orders as $order)
                @if (auth()->user()->hasRole('admin'))
                    <tr :order-data="{{ $order }}">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->file }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        @if (auth()->user()->hasRole('admin'))
                            <td scope="col">{{ $order->user->name }}</td>
                        @endif
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
                    @endcan
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
