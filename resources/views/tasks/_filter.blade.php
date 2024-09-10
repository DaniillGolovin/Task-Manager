<div class="w-full flex items-center">
    <div class="w-full">
        {!! Html::form('GET', route('tasks.index'))->open() !!}
        <div class="flex flex-wrap gap-4">
            <div class="flex-1">
                {!! Html::select('filter[status_id]', $statuses, $filter['status_id'] ?? null)->class('rounded border-gray-300 w-full')->placeholder(__('tasks.Status')) !!}
            </div>
            <div class="flex-1">
                {!! Html::select('filter[created_by_id]', $creators, $filter['created_by_id'] ?? null)->class('rounded border-gray-300 w-full')->placeholder(__('tasks.Author')) !!}
            </div>
            <div class="flex-1">
                {!! Html::select('filter[assigned_to_id]', $executors, $filter['assigned_to_id'] ?? null)->class('rounded border-gray-300 w-full')->placeholder(__('tasks.Executor')) !!}
            </div>
            <div class="flex-shrink-0">
                {!! Html::submit(__('tasks.Apply'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') !!}
            </div>
            {!! Html::form()->close() !!}
        </div>
    </div>
</div>
