@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        @if((request()->is('users/create')))
                            <form method="POST" action="{{ route('users.store') }}">
                        @else
                            <form method="POST" action="{{ route('register') }}">
                        @endif
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" onkeyup="check()" autofocus>
                                    <small id="nameDesc" class="text-danger invisible">The name is already registred.</small>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            @if((request()->is('users/create')))

                                <div class="form-group row">
                                    <label for="admin" class="col-md-4 col-form-label text-md-right">Role</label>

                                    <select class="col-md-6 custom-select"  name="admin[]">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ ($role->id == 2) ? 'selected' : ''}}>{{ $role->description }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function check(){
            var name = $('input#name').val();
            if (name == '') return;
            $.getJSON('/username_in_use/' + name, function (response) {
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
@endsection
