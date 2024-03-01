<?php

namespace App\Providers;

use App\Interfaces\TaskInterface;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            TaskInterface::class,
            TaskRepository::class
        );
    }
}
