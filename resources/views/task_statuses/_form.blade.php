<div class="mt-2">
    {!! Html::label(__('status.Status name'), 'name') !!}
    <div class="mt-2">
        {!! Html::text('name', $status->name ?? '')->class('rounded border-gray-300 w-1/3') !!}
        @error('name')
        <div class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>
