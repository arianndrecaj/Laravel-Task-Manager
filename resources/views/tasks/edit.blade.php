@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="status" class="form-check-input" {{ $task->status ? 'checked' : '' }}>
            <label class="form-check-label" for="status">Completed</label>
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control" required>
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Low</option>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-warning btn-lg mt-3">Update Task</button>
    </form>
</div>
@endsection
