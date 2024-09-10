<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LabelController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Label::class, 'label', [
            'except' => ['index','show'],
        ]);

        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $labels = Label::latest()->paginate(10);

        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $labels = new Label();

        return view('labels.create', compact('labels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LabelRequest $request): RedirectResponse
    {
        $label = Label::create($request->validated());

        flash(__('labels.Label ":name" has been added successfully', ['name' => $label->name]))->success();

        return redirect()->route('labels.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label): View
    {
        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LabelRequest $request, Label $label): RedirectResponse
    {
        $label->update($request->validated());

        flash(__('labels.Label has been updated successfully'))->success();

        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label): RedirectResponse
    {
        if ($label->tasks()->exists()) {
            flash(__('labels.Failed to delete label'))->error();
            return back();
        }

        $label->delete();

        flash(__('labels.Label has been deleted successfully'))->success();

        return redirect()->route('labels.index');
    }
}
