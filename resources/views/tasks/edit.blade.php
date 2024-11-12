@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $task->title }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" name="status" {{ $task->status ? 'checked' : '' }}>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" class="form-control">
                <option value="1" {{ $task->priority = 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ $task->priority = 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ $task->priority = 3 ? 'selected' : '' }}>Low</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Task</button>
    </form>
</div>
@endsection