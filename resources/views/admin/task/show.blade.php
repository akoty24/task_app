@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>Task Details</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>{{ $task->title }}</h2>
                            <p><strong>Description:</strong> {{ $task->description }}</p>
                            <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
                            <p><strong>Status:</strong> {{ $task->status ? 'Complete' : 'Incomplete' }}</p>
                            <p><strong>User ID:</strong> {{ $task->user_id }}</p>
                            <p><strong>Created At:</strong> {{ $task->created_at }}</p>
                            <p><strong>Updated At:</strong> {{ $task->updated_at }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('all_tasks.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
