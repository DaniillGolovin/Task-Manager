<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus as Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskStatusController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Status::class, 'status', [
            'except' => ['index','show'],
        ]);

        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $statuses = Status::latest()->paginate(10);

        return view('task_statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $status = new Status();

        return view('task_statuses.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStatusRequest $request): RedirectResponse
    {
        $status = Status::create($request->validated());

        flash(__('status.Status ":name" has been added successfully', ['name' => $status->name]))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status): View
    {
        return view('task_statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskStatusRequest $request, Status $status): RedirectResponse
    {
        $status->update($request->validated());

        flash(__('status.Status has been updated successfully'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status, Request $request): RedirectResponse
    {
        $status->delete();

        flash(__('status.Status has been deleted successfully'))->success();

        return redirect()->route('task_statuses.index');
    }
}
