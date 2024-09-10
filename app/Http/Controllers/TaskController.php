<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task', [
            'except' => ['index','show'],
        ]);

        $this->middleware('auth')->only(['edit', 'update', 'create', 'store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tasks = QueryBuilder::for(Task::class)
            ->latest()
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])
            ->paginate(15)
            ->appends(request()->query());

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $task = new Task();

        return view('tasks.create', compact('task'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $task = DB::transaction(function () use ($request): Task {
            $task = $request->user()->creator()->create($request->validated());
            $task->labels()->sync($request->labels);

            return $task;
        });

        flash(__('tasks.Tasks ":name" has been added successfully', ['name' => $task->name]))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task = DB::transaction(function () use ($task, $request): Task {
            $task->update($request->validated());
            $task->labels()->sync($request->labels);

            return $task;
        });

        flash(__('tasks.Tasks ":name" has been updated successfully', ['name' => $task->name]))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        flash(__('tasks.Task has been deleted successfully'))->success();

        return redirect()->route('tasks.index');
    }
}
