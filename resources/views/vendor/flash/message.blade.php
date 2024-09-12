@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class=" bottom-4 right-4 p-4 rounded-lg shadow-lg mb-4
                    {{ $message['level'] === 'danger' ? 'bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2' : '' }}
                    {{ $message['level'] === 'info' ? 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2' : '' }}
                    {{ $message['level'] =='success'? 'bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2' : ''}}
                    {{ $message['level'] === 'warning' ? 'bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded ml-2' : '' }}"
             role="alert">

            @if ($message['important'])
                <button type="button"
                        class="ml-4 text-white hover:text-gray-200 float-right"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
