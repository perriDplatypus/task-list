@extends('layouts.app')


@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="font-mdeium text-gray-700 underline decoration-pink-500">
            Go back to the task list
        </a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }}. Updated
        {{ $task->updated_at->diffForHumans() }}.</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
            class="rounded-md px-2 py-1 text-center font-medium text-slate-700 text-white bg-slate-500/80 shadow-m ring-1 ring-slate-700/10 hover:bg-slate-500">
            Edit
        </a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium text-slate-700 text-white bg-blue-500/80 shadow-m ring-1 ring-slate-700/10 hover:bg-blue-500">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="rounded-md px-2 py-1 text-center font-medium text-white bg-red-500/80 shadow-m ring-1 ring-slate-700/10 hover:bg-red-500">
                Delete
            </button>
        </form>
    </div>
@endsection
