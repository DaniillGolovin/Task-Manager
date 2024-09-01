@extends('layouts.app')

@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="grid col-span-full">
            <h1 class="mb-5">
                {{ __('status.Statuses') }}
            </h1>
            {!! Html::form('POST', route('task_statuses.store'))->class('w-50')->open() !!}
                <div class="flex flex-col">
                    <div class="mt-2">
                        {!! Html::label(__('status.Status name'), 'name') !!}
                        <div class="mt-2">
                        {!! Html::text('name')->class($errors->any() ? 'form-control is-invalid' : 'form-control') !!}
                        @if ($errors->any())
                            <div class="invalid-feedback d-block">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        {!! Html::submit(__('status.Create'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') !!}
                    </div>
                </div>
            {!! Html::form()->close() !!}
        </div>
    </div>
</section>
@endsection
