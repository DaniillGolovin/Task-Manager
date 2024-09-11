@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:py-16 lg:pt-28">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('tasks.Edit task') }}</h1>
        </div>
        <div class="grid grid-cols-1">

            {!! Html::form('PATCH', route('tasks.update', $task->id))->class('w-full max-w-2xl mx-auto')->open() !!}
            <div class="flex flex-col space-y-4">
                @include('tasks._form')
                <div>
                    {!! Html::submit(__('tasks.Update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full') !!}
                </div>
            </div>
            {!! Html::form()->close() !!}

        </div>
    </div>
</section>
@endsection
