@include('errors.error')

<form action="{{ route('users.update', [$user->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" disabled>
    </div>

    <div class="form-group">
        <label for="email">Description</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
    </div>

    <div class="form-group row">
        <label for="admin" class="col-md-4 col-form-label text-md-right">Role</label>

        <select class="col-md-6 custom-select"  name="admin[]">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ ($role->id == $user->role_id) ? 'selected' : ''}}>{{ $role->description }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

