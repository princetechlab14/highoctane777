<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SetUserTimezone
{
    public function handle(Request $request, Closure $next)
    {
        // $timezone = session('admin_timezone') ?? config('app.timezone');

        // if ($request->input('timezone')) {
        //     $timezone = $request->input('timezone');
        // }

        // config(['app.timezone' => $timezone]);
        // date_default_timezone_set($timezone);

        // return $next($request);

        // public function handle($request, Closure $next)
        // {
        //     if ($request->timezone) {
        //         Config::set('app.timezone', $request->timezone);
        //         date_default_timezone_set($request->timezone);
        //     }

        //     return $next($request);
        // }

        // Priority 1: Admin session timezone (set on login via browser JS)
        $tz = session('admin_timezone');
 
        // Priority 2: Form field 'timezone' (payment form uses this)
        if (!$tz && $request->input('timezone')) {
            $tz = $request->input('timezone');
        }
 
        // Priority 3: Default UTC
        if (!$tz || !$this->isValid($tz)) {
            // $tz = 'UTC';
            $tz = config('app.timezone');
        }
 
        // ✅ Makes created_at / updated_at / Carbon::now() use correct local time
        date_default_timezone_set($tz);
        Config::set('app.timezone', $tz);
 
        return $next($request);
    }
 
    // ✅ THIS WAS MISSING — caused the "Call to undefined method" error
    private function isValid(string $tz): bool
    {
        try {
            new \DateTimeZone($tz);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
