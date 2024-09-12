@extends('layouts.app')

@section('content')
<section class="bg-white white:bg-gray-900">
    <div class="max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:py-16 lg:pt-28">
        <div class="flex flex-col lg:flex-row justify-between items-center mb-5">
            <h1 class="text-3xl font-bold mb-5 flex items-center">{{ __('labels.Create label') }}</h1>
        </div>

        {!! Html::form('PATCH', route('labels.update', $label->id))->class('w-50')->open() !!}
        <div class="flex flex-col">
            @include('labels._form')
            <div class="mt-2">
                {!! Html::submit(__('labels.Update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') !!}
            </div>
        </div>
        {!! Html::form()->close() !!}

    </div>
</section>
@endsection
