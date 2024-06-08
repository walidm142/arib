<?php

namespace App\Providers;

use App\Http\Repositories\DepartmentRepository;
use App\Http\Repositories\EmployeeRepository;
use App\Http\Repositories\IDepartmentRepository;
use App\Http\Repositories\IEmployeeRepository;
use App\Http\Repositories\ITaskRepository;
use App\Http\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IEmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(IDepartmentRepository::class, DepartmentRepository::class);
        $this->app->bind(ITaskRepository::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
