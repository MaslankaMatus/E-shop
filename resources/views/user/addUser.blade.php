@include('errors.error')
<div class="col-2"></div>

<div class="col-8">
    <form action="/users" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" onkeyup="check()">
            <small id="nameDesc" class="text-danger invisible">The name is already registered.</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>


        <div class="form-group">
            <label for="admin">Role</label>

            <select class="custom-select"  name="role">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ ($role->id == 2) ? 'selected' : ''}}>{{ $role->description }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    function check(){
        var name = $('input#name').val();
        if (name == '') return;
        $.getJSON('/is_username_in_use/' + name, function (response) {
            if (response.is_used == 0){
                $('input#name').removeClass('border-danger');
                $('#nameDesc').addClass('invisible');
            } else{
                $('#nameDesc').removeClass('invisible');
                $('input#name').addClass('border-danger');
            }
        });
    }
</script>
