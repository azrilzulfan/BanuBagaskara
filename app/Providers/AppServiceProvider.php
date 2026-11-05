<?php

namespace App\Providers;

use App\Enums\AspirationStatus;
use App\Models\Aspiration;
use App\Services\BlockEngineService;
use App\Services\SiteSettingsService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SiteSettingsService::class);
        $this->app->singleton(BlockEngineService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! $this->app->isProduction());

        if ($this->app->isProduction() && str_starts_with((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        RateLimiter::for('admin-login', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        View::composer('layouts.public', function ($view) {
            /** @var SiteSettingsService $settings */
            $settings = app(SiteSettingsService::class);
            $view->with([
                'generalSettings' => $settings->getGroup('general'),
                'seoSettings' => $settings->getGroup('seo'),
                'homeSettings' => $settings->getGroup('home'),
                'profileSettings' => $settings->getGroup('profile'),
            ]);
        });

        View::composer('layouts.admin', function ($view) {
            $view->with([
                'newAspirationsCount' => Aspiration::where('status', AspirationStatus::Baru->value)->count(),
            ]);
        });
    }
}
