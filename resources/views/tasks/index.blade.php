@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your tasks</h1>
    <a href="{{ route('tasks.create')}}" class="btn btn-primary">Create Task</a>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <h4>{{ $task->title }}</h4>
                <p>{{ $task->description }}</p>
                <p>Status: {{ $task->status ? 'Completed' : 'Pending'}}</p>
                <p>Priority: {{ $task->priority == 1 ? 'High' : ($task->priority == 2 ? 'Medium' : 'Low')}}</p>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection