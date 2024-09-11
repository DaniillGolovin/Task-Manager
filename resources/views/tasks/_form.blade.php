<div>
    {!! Html::label(__('tasks.Task name'), 'name')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::text('name', $task->name ?? '')->class('rounded border-gray-300 w-full')->placeholder(__('tasks.Enter the name of the task')) !!}
    @error('name')
    <div class="invalid-feedback d-block">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>
<div>
    {!! Html::label(__('tasks.Description'), 'description')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::textarea('description', $task->description ?? '')->class('rounded border-gray-300 w-full h-32')->placeholder(__('tasks.Enter a description of the task')) !!}
</div>
<div>
    {!! Html::label(__('tasks.Status'), 'status_id')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::select('status_id', $statuses, $task->status_id)->class('rounded border-gray-300 w-full') !!}
</div>
<div>
    {!! Html::label(__('tasks.Executor'), 'assigned_to_id')->class('block text-gray-700 font-bold mb-2') !!}
    {!! Html::select('assigned_to_id', $users, $task->assigned_to_id)->class('rounded border-gray-300 w-full')->placeholder(__('---------')) !!}
</div>
<div>
     {!! Html::label(__('tasks.Labels'), 'labels[]')->class('block text-gray-700 font-bold mb-2') !!}
     {!! Html::select('labels[]', $labels)->class('rounded border-gray-300 w-full')->placeholder(__('---------'))->multiple()!!}
</div>
