@extends('layouts.app')

@section('content')
<section class="bg-white white:bg-gray-900 min-h-screen">
    <div class="max-w-screen-xl px-4 mx-auto pt-20 pb-8 lg:py-16 lg:pt-28">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('labels.Labels') }}</h1>
            @auth
                <div class="ml-auto">
                    <a href="{{ route('labels.create') }}"
                       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                        {{ __('labels.Create label') }}
                    </a>
                </div>
            @endauth
        </div>
        @include('flash::message')
        <div class="overflow-x-auto">
            <table class="w-full mt-4 border-collapse">
                <thead class="border-b-2 border-solid border-black text-left">
                <tr>
                    <th class="p-2">{{ __('labels.ID') }}</th>
                    <th class="p-2">{{ __('labels.Label name') }}</th>
                    <th class="p-2">{{ __('labels.Description') }}</th>
                    <th class="p-2">{{ __('labels.Date of creation') }}</th>
                    @auth
                        <th class="p-2">{{ __('labels.Actions') }}</th>
                    @endauth
                </tr>
                </thead>
                <tbody>
                @if ($labels)
                    @foreach ($labels as $label)
                        <tr class="border-b border-dashed text-left">
                            <td class="p-2">{{ $label->id }}</td>
                            <td class="p-2">{{ $label->name }}</td>
                            <td class="p-2">{{ $label->description}}</td>
                            <td class="p-2">{{ $label->created_at->format('d.m.Y') }}</td>
                            @auth
                                <td class="p-2">
                                    @can('update', $label)
                                        <a class="text-blue-600 hover:text-blue-900"
                                           href="{{ route('labels.edit', $label->id) }}">
                                            {{ __('labels.Edit') }}
                                        </a>
                                    @endcan
                                    @can('delete', $label)
                                        <a data-confirm="{{ __('labels.Are you sure?') }}" data-method="delete"
                                           class="text-red-600 hover:text-red-900" rel="nofollow"
                                           href="{{ route('labels.destroy', $label->id) }}">
                                            {{ __('labels.Delete') }}
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
            {{ $labels->links() }}
        </div>
    </div>
</section>
@endsection
