<?php

namespace App\View\Composers;

use App\Models\Label;
use App\Models\TaskStatus as Status;
use App\Models\User;
use Illuminate\View\View;

class TaskComposer
{
    public function compose(View $view)
    {
        $statuses = Status::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        $executors = User::assignedToTasks()->orderBy('name')->pluck('name', 'id');
        $creators = User::creatorOfTheTasks()->orderBy('name')->pluck('name', 'id');

        $filter = request()->has('filter') ? request()->query->all()['filter'] : null;

        $view->with('statuses', $statuses);
        $view->with('users', $users);
        $view->with('labels', $labels);
        $view->with('executors', $executors);
        $view->with('creators', $creators);
        $view->with('filter', $filter);
    }
}
