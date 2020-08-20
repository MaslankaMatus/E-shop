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
        <a class="btn btn-primary mb-2" href="{{ route('pdf') }}">Create PDF</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
{{--                @dump(auth()->user()->hasRole('user'))--}}
{{--                @dump(auth()->user()->hasRole('admin'))--}}

                @foreach( $users as $user)
                    <tr :user-data="{{ $user }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if( $user->hasRole('admin'))
                            <td>Admin</td>
                        @else
                            <td>User</td>
                        @endif
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('users.edit', [$user->id]) }}">EDIT</a></td>
                        <td>
                            {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
