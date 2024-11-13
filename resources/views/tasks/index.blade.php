@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">Your Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-light">Create New Task</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tasks.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="status" class="text-white">Status</label>
                <select name="status" class="form-control bg-dark text-white border-white">
                    <option value="" {{ session('status') === null ? 'selected' : '' }}>All</option>
                    <option value="1" {{ session('status') == '1' ? 'selected' : '' }}>Completed</option>
                    <option value="0" {{ session('status') == '0' ? 'selected' : '' }}>Not Completed</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="priority" class="text-white">Priority</label>
                <select name="priority" class="form-control bg-dark text-white border-white">
                    <option value="" {{ session('priority') === null ? 'selected' : '' }}>All</option>
                    <option value="1" {{ session('priority') == '1' ? 'selected' : '' }}>High</option>
                    <option value="2" {{ session('priority') == '2' ? 'selected' : '' }}>Medium</option>
                    <option value="3" {{ session('priority') == '3' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>



    <div class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead class="table-dark">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Created At</th> 
        <th class="text-center">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description }}</td>
            <td>
                <span class="badge {{ $task->status ? 'bg-success' : 'bg-warning' }}">
                    {{ $task->status ? 'Completed' : 'Pending' }}
                </span>
            </td>
            <td>
                <span
                    class="badge {{ $task->priority == 1 ? 'bg-danger' : ($task->priority == 2 ? 'bg-info' : 'bg-secondary') }}">
                    {{ $task->priority == 1 ? 'High' : ($task->priority == 2 ? 'Medium' : 'Low') }}
                </span>
            </td>
            <td>{{ $task->created_at->format('d-m-Y') }}</td> 
            <td class="text-center">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this task?');
    }
</script>
@endsection