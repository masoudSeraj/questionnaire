<?php

namespace App\Http\Middleware;

use App\Models\Responder;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Visit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd($request);
        $utm = [
            'utm_campaign' => $request->query('utm_campaign'),
        ];

        if (! is_null($request->query('utm_source'))) {
            $utm['utm_source'] = $request->query('utm_source');
            $utm['utm_medium'] = $request->query('utm_medium');
        } else {
            $utm['utm_source'] = $request->headers->get('referer');
            $utm['utm_medium'] = 'referral';
        }

        $responder = Responder::create([
            'uuid' => Str::uuid(),
            'ip_address' => $request->ip ?? '00.00.00.00',
            'utm_source' => $utm['utm_source'],
            'utm_medium' => $utm['utm_medium'],
            'utm_campaign' => $utm['utm_campaign'],
            'user_agent' => $request->userAgent(),
            'finger_print' => $request->fingerprint(),
        ]);
        session()->put('responder', $responder->uuid);

        return $next($request);
    }
}
