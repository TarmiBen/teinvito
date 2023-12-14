<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use App\Events\RouteVisited;
use Illuminate\Support\Facades\Event;
use App\Models\Visit;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/user/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->prefix('user')
                ->group(base_path('routes/user.php'));

            Route::middleware('web')
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

                $this->registerVisits();
        });

        Event::listen(RouteVisited::class, function ($event) {
            $ruta = Visit::where('name', $event->nameRoute)->first();
            if (!$ruta) {
                Visit::create([
                    'name' => $event->nameRoute,
                    'count' => 0,
                ]);
            }
        });
    }

    protected function registerVisits()
    {
        collect(Route::getRoutes())->each(function ($route) {
            $nombreRuta = $route->uri();
            $excludedStrings = ['_ignition', 'livewire', 'user', 'admin', '{token}', 'sanctum', 'json', '{cp}', '{hash}', 'api'];
            if ($nombreRuta && !collect($excludedStrings)->contains(function ($excludedString) use ($nombreRuta) {
                return str_contains($nombreRuta, $excludedString);
            })) {
                event(new RouteVisited($nombreRuta));
            }
        });
    }
}
