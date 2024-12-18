<?php

namespace App\Providers;

use App\Repository\BuildingsRepository;
use App\Repository\CommentsRepository;
use App\Repository\Interface\BuildingsRepositoryInterface;
use App\Repository\Interface\CommentsRepositoryInterface;
use App\Repository\Interface\TasksRepositoryInterface;
use App\Repository\TasksRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TasksRepositoryInterface::class, TasksRepository::class);
        $this->app->bind(CommentsRepositoryInterface::class, CommentsRepository::class);
        $this->app->bind(BuildingsRepositoryInterface::class, BuildingsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
