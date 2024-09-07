<?php

namespace Database\Seeders;

use App\Models\TaskStatus as Status;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'новая',
            'в работе',
            'на тестировании',
            'завершена',
        ];

        foreach ($statuses as $status) {
            Status::factory([])->create([
                'name' => $status,
            ]);
        }
    }
}
