@extends('layouts.app')

@section('title', 'List of Tasks')

@section('content')
    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
    <div>
        @forelse ($tasks as $task)
            <div>
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
            </div>
        @empty
            <div>There are no tasks</div>
        @endforelse
    </div>

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
