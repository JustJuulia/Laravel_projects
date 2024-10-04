<?php

namespace App\Providers;

use App\Models\News_mod;
use App\Policies\NewsPolicy;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        News_mod::class => NewsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Route::get('admin', function () {
            if (Gate::denies('admin-access')) {
                abort(403);
            }
        
            echo 'Panel administratora';
        })->name('admin-panel');
    }
}
