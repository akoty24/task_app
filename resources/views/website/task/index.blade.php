@extends('website.layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">

        <h1 class="text-center">Task List</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>

        @if(count($tasks) > 0)
            <table class="table mt-3">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->status ? 'Complete' : 'Incomplete' }}</td>
                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <br>
            <br>
            <br>
            <h3 class="text-center">No tasks found.</h3>
        @endif
    </div>
@endsection
