@extends('website.layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px; margin-left: 22%">
        <div class="col-md-6">
            <div class="card" style="background-color: #cbd5e0">
                <div class="card-body">
                    <h1 class="card-title text-center">Edit Task</h1>
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                            @error('title')
                            <span class="alert-danger">
                            {{ $message }}
                       </span>  @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
                            @error('description')
                            <span class="alert-danger">
                            {{ $message }}
                       </span>  @enderror
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
                            @error('due_date')
                            <span class="alert-danger">
                            {{ $message }}
                       </span>  @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Incomplete</option>
                                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Complete</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
