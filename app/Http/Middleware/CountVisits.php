<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CountVisits
{
    public function handle(Request $request, Closure $next)
    {
        try {
            $routeName = $request->route()->getName();
            $pageCounts = [
                'home' => 'app_count',
                'jenjang.tk' => 'tk_count',
                'jenjang.sd' => 'sd_count',
                'jenjang.smp' => 'smp_count',
                'jenjang.sma' => 'sma_count',
            ];

            $pageKey = array_key_exists($routeName, $pageCounts) ? $pageCounts[$routeName] : null;

            if ($pageKey && !Session::has("visited_$pageKey")) {
                Log::info("New visit detected for page: $routeName, IP: " . $request->ip());

                $visit = Visit::first();
                if ($visit) {
                    $visit->increment($pageKey);
                    Log::info("Visit count for $pageKey incremented to: " . $visit->$pageKey);
                } else {
                    $visit = Visit::create([
                        'count' => 0,
                        'app_count' => $routeName === 'home' ? 1 : 0,
                        'tk_count' => $routeName === 'jenjang.tk' ? 1 : 0,
                        'sd_count' => $routeName === 'jenjang.sd' ? 1 : 0,
                        'smp_count' => $routeName === 'jenjang.smp' ? 1 : 0,
                        'sma_count' => $routeName === 'jenjang.sma' ? 1 : 0,
                    ]);
                    Log::info("New visit record created for $pageKey with count: 1");
                }

                Session::put("visited_$pageKey", true);
                Log::info("Session marked as visited for $pageKey");
            } else {
                Log::info("Visit already counted in this session for page: $routeName, IP: " . $request->ip());
            }
        } catch (\Exception $e) {
            Log::error('Error in CountVisits middleware: ' . $e->getMessage());
        }

        return $next($request);
    }
}