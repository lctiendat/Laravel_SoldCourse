<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Observers\CourseObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Interfaces\CategoryRepositoryInterface::class,
            \App\Repositories\CategoryEloquentRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Interfaces\BlogRepositoryInterface::class,
            \App\Repositories\BlogEloquentRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Interfaces\CourseRepositoryInterface::class,
            \App\Repositories\CourseEloquentRepository::class,
        );
        $this->app->singleton(
            \App\Repositories\Interfaces\OrderRepositoryInterface::class,
            \App\Repositories\OrderEloquentRepository::class,
        );$this->app->singleton(
            \App\Repositories\Interfaces\UserRepositoryInterface::class,
            \App\Repositories\UserEloquentRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Paginator::useBootstrap();
        Course::observe(new CourseObserver);
        Course::deleting(function ($course) {
            $course->comments()->delete();
        });
    }
}
