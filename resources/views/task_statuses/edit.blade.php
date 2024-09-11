@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('status.Status edit') }}</h1>

            {!! Html::form('PATCH', route('task_statuses.update', ['status' => $status]))->class('w-50')->open() !!}
                <div class="flex flex-col">
                    @include('task_statuses._form')
                    <div class="mt-2">
                        {!! Html::submit(__('status.Edit'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') !!}
                    </div>
                </div>
            {!! Html::form()->close() !!}

        </div>
    </div>
</section>
@endsection
