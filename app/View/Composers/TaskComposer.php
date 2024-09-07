<?php

namespace App\View\Composers;

use App\Models\TaskStatus as Status;
use App\Models\User;
use Illuminate\View\View;

class TaskComposer
{
    public function compose(View $view)
    {
        $statuses = Status::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        $view->with('statuses', $statuses);
        $view->with('users', $users);
    }
}
