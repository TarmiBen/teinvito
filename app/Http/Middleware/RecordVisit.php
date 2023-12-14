<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Events\RouteVisited;
use App\Models\Device;
use App\Models\Ip_address;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Torann\GeoIP\Facades\GeoIP;

class RecordVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $route = Route::getRoutes()->match($request);
        $visitedUriSegments = explode('/', $request->path());
        $definedUriSegments = explode('/', $route->uri());
        $uriToRecord = implode('/', array_map(function ($visitedSegment, $definedSegment) {
            return Str::startsWith($definedSegment, '{') ? $definedSegment : $visitedSegment;
        }, $visitedUriSegments, $definedUriSegments));
    
        $today = date('Y-m-d');
    
        $visit = Visit::where('name', $uriToRecord)->first();
    
        if ($visit) {
            $currentWeek = date('W');
            $currentMonth = date('m');
        
            if ($visit->date < $today) {
                $visit->update(['daily_count' => 1, 'date' => $today]);
        
                if ($visit->week < $currentWeek) {
                    $visit->update(['weekly_count' => 1, 'week' => $currentWeek]);
                } else {
                    $visit->increment('weekly_count');
                }
        
                if ($visit->month < $currentMonth) {
                    $visit->update(['monthly_count' => 1, 'month' => $currentMonth]);
                } else {
                    $visit->increment('monthly_count');
                }
            } else {
                $visit->increment('daily_count');
                $visit->increment('weekly_count');
                $visit->increment('monthly_count');
            }
        }
        
        $agent = new Agent();
        $deviceType = $agent->isDesktop() ? 'Desktop' : ($agent->isPhone() ? 'Phone' : 'Tablet');
        $platform = $agent->platform();
        $ip = $request->ip();
        $browserOrBot = $agent->isRobot() ? $agent->robot() : $agent->browser();

        $device = Device::firstOrCreate([
            'name' => $deviceType,
            'platform' => $platform,
            'browser' => $browserOrBot,
            'ip' => $ip,
        ]);

        $location = GeoIP::getLocation($ip);

        $address = Ip_address::firstOrCreate([
            'ip' => $ip,
            'country' => $location['country'],
            'city' => $location['city'],
            'state' => $location['state_name'],
        ]);
        return $next($request);
    }
}
