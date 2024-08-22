<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'новый',
            'в работе',
            'на тестировании',
            'завершен',
        ];

        foreach ($statuses as $status) {
            TaskStatus::factory([])->create([
                'name' => $status,
            ]);
        }
    }
}
