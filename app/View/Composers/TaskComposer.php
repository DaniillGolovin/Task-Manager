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

        $view->with('statuses', $statuses);
        $view->with('users', $users);
        $view->with('labels', $labels);
    }
}
