@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="my-4 text-white">Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="title" class="text-white">Title</label>
                    <input type="text" name="title" class="form-control bg-dark text-white border-white" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="text-white">Description</label>
                    <textarea name="description" class="form-control bg-dark text-white border-white" required></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="status" class="text-white">Status</label>
                    <div class="form-check">
                        <input type="checkbox" name="status" class="form-check-input">
                        <label class="form-check-label text-white" for="status">Completed</label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="priority" class="text-white">Priority</label>
                    <select name="priority" class="form-control bg-dark text-white border-white">
                        <option value="1">High</option>
                        <option value="2">Medium</option>
                        <option value="3">Low</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg">Create Task</button>
        </div>
    </form>
</div>
@endsection
