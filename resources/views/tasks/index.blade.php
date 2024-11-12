@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-light">Your Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-light">Create New Task</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
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
                            <span class="badge {{ $task->priority == 1 ? 'bg-danger' : ($task->priority == 2 ? 'bg-info' : 'bg-secondary') }}">
                                {{ $task->priority == 1 ? 'High' : ($task->priority == 2 ? 'Medium' : 'Low') }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
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
@endsection
