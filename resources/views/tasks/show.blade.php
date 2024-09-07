@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:py-16 lg:pt-28">
        <div class="grid grid-cols-1 gap-8">
            <h1 class="text-3xl font-bold mb-5 flex items-center">
                {{ __('tasks.View a task') }}: {{ $task->name }}
                @can('update', $task)
                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="ml-4 text-blue-500 hover:text-blue-700">
                    &#9881;
                </a>
                @endcan
            </h1>
            <div class="space-y-4">
                <p><span class="font-bold">{{ __('tasks.Task name') }}:</span> {{ $task->name }}</p>
                <p><span class="font-bold">{{ __('tasks.Status') }}:</span> {{ $task->status->name }}</p>
                @if ($task->description)
                    <p><span class="font-bold">{{ __('tasks.Description') }}:</span> {{ $task->description }}</p>
                @endif
                <p><span class="font-bold">{{ __('tasks.Date of creation') }}:</span> {{ $task->created_at->diffForHumans() }}</p>
                @if ($task->labels)
                    <p class="font-bold">{{ __('tasks.Labels') }}:</p>
                    @foreach ($task->labels as $label)
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            {{ $label->name }}
                            </span>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
