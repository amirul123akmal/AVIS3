<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use App\Events\Registered;
use App\Listeners\SendVerificationEmailListener;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Registered::class, SendVerificationEmailListener::class);

        // Blade directive for admin    
        Blade::directive('admin', function () {
            return "<?php if(auth()->check() && (auth()->user()->actor->accountType->accountType) == 'admin'): ?>";
        });

        Blade::directive('endadmin', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('beneficiary', function () {
            return "<?php if(auth()->check() && (auth()->user()->actor->accountType->accountType) == 'beneficiaries'): ?>";
        });

        Blade::directive('endbeneficiary', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('volunteer', function () {
            return "<?php if(auth()->check() && (auth()->user()->actor->accountType->accountType) == 'volunteers'): ?>";
        });

        Blade::directive('endvolunteer', function () {
            return "<?php endif; ?>";
        });
    }
}
