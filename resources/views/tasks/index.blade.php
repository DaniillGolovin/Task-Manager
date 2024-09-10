@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900 min-h-screen">
    <div class="max-w-screen-xl px-4 mx-auto pt-20 pb-8 lg:py-16 lg:pt-28">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('tasks.Tasks') }}</h1>
            @auth
                <div class="ml-auto">
                    <a href="{{ route('tasks.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        {{ __('tasks.Create task') }}
                    </a>
                </div>
            @endauth
        </div>
        @include('flash::message')
        <div class="overflow-x-auto">
            <table class="w-full mt-4 border-collapse">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th class="p-2">{{ __('tasks.ID') }}</th>
                    <th class="p-2">{{ __('tasks.Status') }}</th>
                    <th class="p-2">{{ __('tasks.Task name') }}</th>
                    <th class="p-2">{{ __('tasks.Author') }}</th>
                    <th class="p-2">{{ __('tasks.Executor') }}</th>
                    <th class="p-2">{{ __('tasks.Date of creation') }}</th>
                    @auth
                        <th class="p-2">{{ __('tasks.Actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>
                @if ($tasks)
                    @foreach ($tasks as $task)
                        <tr class="border-b border-dashed">
                            <td class="p-2">{{ $task->id }}</td>
                            <td class="p-2">{{ $task->status->name }}</td>
                            <td class="p-2">
                                <a class="text-blue-600 hover:text-blue-900"
                                   href="{{ route('tasks.show', $task->id) }}">
                                    {{ $task->name }}
                                </a>
                            </td>
                            <td class="p-2">{{ $task->creator->name }}</td>
                            <td class="p-2">{{ $task->executor->name ?? 'Не указано' }}</td>
                            <td class="p-2">{{ $task->created_at->format('d.m.Y') }}</td>
                            @auth
                                <td class="p-2">
                                    @can('update', $task)
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-600 hover:text-blue-900">
                                            {{ __('tasks.Edit') }}
                                        </a>
                                    @endcan
                                    @can('delete', $task)
                                        <a data-confirm="Вы уверены?" data-method="delete" rel="nofollow" href="{{ route('tasks.destroy', $task->id) }}" class="text-red-600 hover:text-red-900">
                                            {{ __('tasks.Delete') }}
                                        </a>
                                    @endcan
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
</section>
@endsection
