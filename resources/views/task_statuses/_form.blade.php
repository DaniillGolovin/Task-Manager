<div class="mt-2">
    {!! Html::label(__('status.Status name'), 'name') !!}
    <div class="mt-2">
        {!! Html::text('name', $status->name ?? '')->class($errors->any() ? 'form-control is-invalid' : 'form-control') !!}
        @error('name')
        <div class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
</div>
