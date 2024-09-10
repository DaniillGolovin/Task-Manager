<div class="mt-2">
    {!! Html::label(__('labels.Label name'), 'name')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::text('name', $label->name ?? '')->class($errors->any() ? 'form-control is-invalid' : 'form-control')->placeholder(__('labels.Enter a name of the label')) !!}
    @error('name')
        <div class="invalid-feedback d-block">
            <strong>{{ $message }}</strong>
        </div>
    @enderror
</div>
<div class="mt-2">
    {!! Html::label(__('labels.Description'), 'description')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::textarea('description', $label->description ?? '')->class('rounded border-gray-300 w-full h-32')->placeholder(__('labels.Enter a description of the label')) !!}
</div>
