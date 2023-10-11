@extends('website.layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        <h1>Task Details</h1>
        <div>
            <strong>Title:</strong> {{ $task->title }}
        </div>
        <div>
            <strong>Description:</strong> {{ $task->description }}
        </div>
        <div>
            <strong>Due Date:</strong> {{ $task->due_date }}
        </div>
        <div>
            <strong>Status:</strong> {{ $task->status ? 'Complete' : 'Incomplete' }}
        </div>
        <div>
            <strong>Created At:</strong> {{ $task->created_at }}
        </div>
        <div>
            <strong>Updated At:</strong> {{ $task->updated_at }}
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back to Task List</a>
    </div>
@endsection
