@extends('layouts.app')

@section('title', 'List of Tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="font-mdeium text-gray-700 underline decoration-pink-500">Add Task</a>
    </nav>
    <div>
        @forelse ($tasks as $task)
            <div class="mb-2 text-slate-700">
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    @class(['line-through' => $task->completed])>{{ $task->title }}</a>
            </div>
        @empty
            <div class="mb-2 text-slate-700">There are no tasks</div>
        @endforelse
    </div>

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
