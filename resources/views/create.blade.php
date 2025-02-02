@extends('layouts.app')

@section('title', 'Create new Task')

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input text="text" name="title" id="title" />
        </div>
        <div>
            <label for="title">Description</label>
            <textarea text="text" name="description" id="description" rows="5"></textarea>
        </div>
        <div>
            <label for="title">Long Description</label>
            <textarea text="text" name="long_description" id="long_description" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@endsection
