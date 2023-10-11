
@extends('website.layouts.app')
@section('content')
    <div class="row justify-content-center" style="margin-top: 50px">
        <div class="col-md-6">
            <div class="card" style="background-color: #cbd5e0">
                <div class="logo">
                    <div class="col-md-12 text-center">
                        <h1>Register</h1>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                            @error('name')
                            <span class="alert-danger">
                            {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            @error('email')
                            <span class="alert-danger">
                           {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter your password">
                            @error('password')
                            <span class="alert-danger">
                           {{ $message }}
                        </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"  placeholder="confirm your password">
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <div class="form-group">
                        <p class="text-center">Already have an account? <a href="{{route('user.login.form')}}" id="signup">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
