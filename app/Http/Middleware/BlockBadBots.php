<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockBadBots
{
    public function handle(Request $request, Closure $next)
    {
        $badBots = [
            'curl',
            'wget',
            'python',
            'scrapy',
            'nikto',
            'sqlmap',
            'scanner'
        ];

        $agent = strtolower($request->header('User-Agent'));

        foreach ($badBots as $bot) {
            if (str_contains($agent, $bot)) {
                abort(403, 'Forbidden');
            }
        }

        return $next($request);
    }
}
