@extends('layouts.app')

@section('content')
<section class="bg-white white:bg-gray-900 min-h-screen">
    <div class="max-w-screen-xl px-4 mx-auto pt-20 pb-8 lg:py-16 lg:pt-28">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('status.Statuses') }}</h1>
            @auth
                <div class="ml-auto">
                    <a href="{{ route('task_statuses.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        {{ __('status.Create status') }}
                    </a>
                </div>
            @endauth
        </div>
        @include('flash::message')
        <div class="overflow-x-auto">
            <table class="w-full mt-4 border-collapse">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th>ID</th>
                    <th>{{ __('status.Status name') }}</th>
                    <th>{{ __('status.Date of creation') }}</th>
                    @auth
                        <th>{{ __('status.Actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>
                @if ($statuses)
                    @foreach ($statuses as $status)
                        <tr class="border-b border-dashed text-left">
                            <td class="p-2">{{ $status->id }}</td>
                            <td class="p-2">{{ $status->name }}</td>
                            <td class="p-2">{{ $status->created_at->format('d.m.Y') }}</td>
                            @auth
                                <td class="p-2">
                                    @can('update', $status)
                                        <a class="text-blue-600 hover:text-blue-900" href="{{ route('task_statuses.edit', $status->id) }}">
                                            {{ __('status.Edit') }}
                                        </a>
                                    @endcan
                                    @can('delete', $status)
                                        <a data-confirm="{{ __('status.Are you sure?') }}" data-method="delete"  class="text-red-600 hover:text-red-900" rel="nofollow" href="{{ route('task_statuses.destroy', $status) }}">
                                            {{ __('status.Delete') }}
                                        </a>
                                    @endcan
                                </td>
                            @endauth
                        </tr>
                    @endforeach
                @endif
                <tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $statuses->links() }}
        </div>
    </div>
</section>
@endsection
