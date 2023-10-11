@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>All Tasks</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ route('all_tasks.index') }}" method="GET" class="form-inline">
                        <input type="text" name="query" class="form-control mr-sm-2" placeholder="Search">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Task List</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>User ID</th>
                                    <th>Actions</th> <!-- Added Actions column -->
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->due_date }}</td>
                                        <td>{{ $task->status ? 'Complete' : 'Incomplete' }}</td>
                                        <td>{{ $task->user_id }}</td>
                                        <td>
                                            <a href="{{ route('all_tasks.show', $task->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('all_tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('all_tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
