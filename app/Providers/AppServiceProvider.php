<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Http\ViewComposers\ActivityComposer;
use App\Models\BlogPost;
use App\Observers\BlogPostObserver;
use App\Models\Comment;
use App\Observers\CommentObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Blade::component('components.badge', 'badge');
        // Blade::component('components.updated', 'updated');

        // view()->composer('*', ActivityComposer::class);
        view()->composer(['posts.index', 'posts.show'], ActivityComposer::class);
        BlogPost::observe(BlogPostObserver::class);
        Comment::observe(CommentObserver::class);
        Schema::defaultStringLength(191);
    }
}
