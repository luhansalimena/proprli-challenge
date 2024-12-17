<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Building;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       Building::factory(10)->create();
       Building::all()->each(function (Building $building) {
           $building->tasks()->saveMany(Task::factory(5)->make());
           $building->tasks->each(function (Task $task) {
               $task->comments()->saveMany(Comment::factory(2)->make());
           });
       });
    }
}
