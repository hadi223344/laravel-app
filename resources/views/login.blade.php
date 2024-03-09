@extends('master')
@section('content')
    <div class='container custom-login'>
        <div class='row'>
            <div class='col-sm-4 offset-sm-4'>
                <form action="login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username or Email address</label>
                        <input type="text" name="emailOrUser" class="form-control"
                            @if (session('userAc')) value = "{{ session('userAc') }}"
                        @else value = "{{ old('emailOrUser') }}" @endif
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        {{-- @if (session('errors'))
                            <div class='text-danger'>
                                {{ session('errors') }}
                            </div>
                        @endif --}}
                        @error('emailOrUser')
                            <div class='text-danger'>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1"
                            value='{{ old('loginPassword') }}'>
                        <div class='text-danger'>
                            @error('loginPassword')
                                {{ $message }}
                            @enderror
                            @if (session('userAc'))
                                password is wrong
                            @endif
                        </div>
                        <div class="mb-3 mt-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label " for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a class='offset-sm-7' href="signIn" style='text-decoration: dashed dodgerblue'>I am new</a>
                </form>
            </div>
        </div>
    </div>
@endsection
