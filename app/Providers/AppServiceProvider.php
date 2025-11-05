<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        // Evita conexión a BD si la app se está construyendo o no hay DB disponible
        if (app()->runningInConsole() && !app()->runningUnitTests()) {
            return;
        }

        try {
            // Comprobamos que la base de datos esté accesible antes de consultar
            DB::connection()->getPdo();

            $user_languages = \App\Models\Language::where('status', '1')->get();
            $setting = \App\Models\Setting::where('status', '1')->first();
            $topbarSetting = \App\Models\Web\TopbarSetting::where('status', '1')->first();
            $socialSetting = \App\Models\Web\SocialSetting::where('status', '1')->first();
            $schedule_setting = \App\Models\ScheduleSetting::where('slug', 'fees-schedule')->first();
            $footer_pages = \App\Models\Web\Page::where('language_id', optional(\App\Models\Language::version())->id)
                ->where('status', '1')
                ->orderBy('id', 'asc')
                ->get();

            if ($setting && $setting->time_zone) {
                Config::set('app.timezone', $setting->time_zone);
            }

            View::share([
                'setting' => $setting,
                'user_languages' => $user_languages,
                'schedule_setting' => $schedule_setting,
                'topbarSetting' => $topbarSetting,
                'socialSetting' => $socialSetting,
                'footer_pages' => $footer_pages
            ]);
        } catch (\Exception $e) {
            // Durante el build o si no hay conexión, simplemente ignorar
            Log::warning('AppServiceProvider: sin conexión a BD durante el boot -> ' . $e->getMessage());
        }
    }
}