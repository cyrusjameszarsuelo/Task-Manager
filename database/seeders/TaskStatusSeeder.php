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
        $data = [
            ['status' => 'Backlogs', 'bg_color' => 'card-secondary', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'To Do', 'bg_color' => 'card-primary','created_at' => now(), 'updated_at' => now()],
            ['status' => 'In Progress', 'bg_color' => 'card-info', 'created_at' => now(), 'updated_at' => now()],
            ['status' => 'Done', 'bg_color' => 'card-success', 'created_at' => now(), 'updated_at' => now()],
        ];

        TaskStatus::insert($data);
    }
}
