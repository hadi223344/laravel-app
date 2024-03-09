@extends('master')
@section('content')
    <div class='container custom-login'>
        <div class='row'>
            <div class='col-sm-4 offset-sm-4'>
                <form action="signIn" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                            id="exampleInputUser1" aria-describedby="emailHelp">
                        <div class='text-danger'>
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        <div class='text-danger'>
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="text" name="SigninPassword" class="form-control" id="exampleInputPassword1"
                            value="{{ old('SigninPassword') }}">

                        <div class='text-danger'>
                            @error('SigninPassword')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword2" class="form-label"> Retry Password</label>
                        <input type="text" name="SigninPassword_confirmation" class="form-control" id="exampleInputPassword2" 
                        value="{{ old('SigninPassword_confirmation') }}">

                        <div class='text-danger'>
                            @error('SigninPassword')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>

                    <button type="submit" class="btn btn-primary">SignIn</button>
                    @if (session('user'))
                        <div class='text-info'>{{ session('user') }}</div>
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection
