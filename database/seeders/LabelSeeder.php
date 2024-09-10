<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            'ошибка' => 'Какая-то ошибка в коде или проблема с функциональностью',
            'документация' => 'Задача которая касается документации',
            'дубликат' => 'Повтор другой задачи',
            'доработка' => 'Новая фича, которую нужно запилить',
        ];

        foreach ($statuses as $key => $status) {
            Label::factory([])->create([
                'name' => $key,
                'description' => $status,
            ]);
        }
    }
}
