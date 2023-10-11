@extends('website.layouts.app')
@section('content')
    <div class="row justify-content-center" style="margin-top: 50px">
        <div class="col-md-6">
            <div class="card" style="background-color: #cbd5e0">
                <div class="logo">
                    <div class="col-md-12 text-center">
                        <h1>Login</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="enter email">
                            @error('email')
                            <span class="alert-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="enter password">
                            @error('password')
                            <span class="alert-danger">
                           {{ $message }}
                        </span>
                            @enderror
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="form-group">
                        <p class="text-center">Don't have account? <a href="{{route('user.register.form')}}" id="signup">Sign up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
