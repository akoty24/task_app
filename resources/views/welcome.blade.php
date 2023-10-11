@extends('website.layouts.app')

@section('content')

    <div class="container" style="margin-top: 100px; margin-left: 26%">
        <h1>Welcome to Our Website</h1>
        <p>Explore our services and features.</p>

        <a href="{{ auth()->check() ? route('tasks.create') : route('user.login.form') }}" class="btn btn-primary">
            Create Task
        </a>
    </div>
@endsection
