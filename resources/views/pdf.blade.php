<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        width: 150px;
    }
</style>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Created</th>

    </tr>
    </thead>
    <tbody>

    @foreach( $users as $user)
        <tr :user-data="{{ $user }}">
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            @if( $user->hasRole('admin'))
                <td>Admin</td>
            @else
                <td>User</td>
            @endif
            <td>{{ $user->created_at->format('d.m.yy') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>


