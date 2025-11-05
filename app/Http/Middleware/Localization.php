<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       try {
           if(Session::has('locale'))
           {
               $locale = Session::get('locale');
               // Verificar que el idioma existe en la base de datos
               $language = Language::where('code', $locale)->where('status', '1')->first();
               if($language) {
                   App::setLocale($locale);
               } else {
                   // Si el idioma de sesión no existe, usar el por defecto
                   $defaultLanguage = Language::where('default', '1')->where('status', '1')->first();
                   if($defaultLanguage) {
                       App::setLocale($defaultLanguage->code);
                       Session::put('locale', $defaultLanguage->code);
                   } else {
                       // Fallback al idioma configurado en config/app.php
                       App::setLocale(config('app.locale', 'en'));
                   }
               }
           }
           else
           {
               $language = Language::where('default', '1')->where('status', '1')->first();
               if(isset($language->code))
               {
                   App::setLocale($language->code);
                   Session::put('locale', $language->code);
               }
               else
               {
                   // Fallback al idioma configurado en config/app.php
                   App::setLocale(config('app.locale', 'en'));
               }
           }
       } catch(\Exception $e) {
           // En caso de error, usar el idioma por defecto
           App::setLocale(config('app.locale', 'en'));
       }
       
       return $next($request);
    }
}
