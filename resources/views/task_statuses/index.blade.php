@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('status.Statuses') }}</h1>
            @include('flash::message')
            @auth
                <div>
                    <a href="{{ route('task_statuses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('status.Create status') }}
                    </a>
                </div>
            @endauth
            <table class="mt-4">
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
                @if ($statuses)
                    @foreach ($statuses as $status)
                        <tr class="border-b border-dashed text-left">
                            <td>{{ $status->id }}</td>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->created_at->format('d.m.Y') }}</td>
                            <td>
                                @auth
                                    @can('update', $status)
                                        <a class="text-blue-600 hover:text-blue-900 no-underline" href="{{ route('task_statuses.edit', $status->id) }}">{{ __('status.Edit') }}</a>
                                    @endcan
                                    @can('delete', $status)
                                        <a data-confirm="Вы уверены?" data-method="delete"  class="text-red-600 hover:text-red-900 no-underline" href="{{ route('task_statuses.destroy', $status) }}">
                                            {{ __('status.Delete') }}
                                        </a>
                                    @endcan
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
            @if ($statuses->total() > $statuses->perPage())
                {{ $statuses->links() }}
            @endif
        </div>
    </div>
</section>
@endsection
