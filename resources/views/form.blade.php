@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create new Task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title" class="block uppercase text-slate-700 mb2">Title</label>
            <input text="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none" />
            @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description" class="block uppercase text-slate-700 mb2 mt-2">Description</label>
            <textarea text="text" name="description" id="description" rows="5"
                class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description" class="block uppercase text-slate-700 mb2 mt-2">Long Description</label>
            <textarea text="text" name="long_description" id="long_description" rows="10"
                class="shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none">{{ $task->long_description ?? old('long_description') }}
            </textarea>
            @error('long_description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit"
                class="w-32 rounded-md px-2 py-1 text-center font-medium text-slate-700 text-white bg-slate-500/80 shadow-m ring-1 ring-slate-700/10 hover:bg-slate-500 mt-4">
                Add Task
            </button>
            <button href="{{ route('tasks.show', ['task' => isset($task) ?? $task->id]) }}"
                class="w-32 rounded-md px-2 py-1 text-center font-medium text-white bg-red-500/80 shadow-m ring-1 ring-slate-700/10 hover:bg-red-500 mt-4">
                Cancel
            </button>
        </div>
    </form>
@endsection
