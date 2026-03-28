<?php

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use GeoIp2\Database\Reader;

class TrackVisit
{
    public function handle(Request $request, Closure $next)
    {
        // Пропускаем админку, API, статику
        if ($this->shouldSkip($request)) {
            return $next($request);
        }

        try {
            $ip = $request->ip();
            $country = null;
            $countryName = null;
            $city = null;
            $lat = null;
            $lon = null;

            // GeoIP lookup
            $dbPath = storage_path('geoip/GeoLite2-City.mmdb');
            if (file_exists($dbPath) && $ip !== '127.0.0.1') {
                $reader = new Reader($dbPath);
                $record = $reader->city($ip);
                $country = $record->country->isoCode;
                $countryName = $record->country->name;
                $city = $record->city->name;
                $lat = $record->location->latitude;
                $lon = $record->location->longitude;
                $reader->close();
            }

            // Parse User-Agent
            $ua = $request->userAgent() ?? '';
            $deviceType = $this->detectDevice($ua);
            $browser = $this->detectBrowser($ua);
            $os = $this->detectOs($ua);

            Visit::create([
                'url'          => $request->path(),
                'ip'           => $ip,
                'country'      => $country,
                'country_name' => $countryName,
                'city'         => $city,
                'latitude'     => $lat,
                'longitude'    => $lon,
                'user_agent'   => substr($ua, 0, 255),
                'referer'      => $request->header('referer'),
                'device_type'  => $deviceType,
                'browser'      => $browser,
                'os'           => $os,
            ]);
        } catch (\Exception $e) {
            // Не ломаем сайт из-за ошибки аналитики
        }

        return $next($request);
    }

    private function shouldSkip(Request $request): bool
    {
        $path = $request->path();

        // Пропускаем админку, livewire, storage, иконки
        foreach (['admin', 'livewire', 'storage', 'icons', 'css', 'js', 'images'] as $skip) {
            if (str_starts_with($path, $skip)) return true;
        }

        // Пропускаем ботов
        $ua = strtolower($request->userAgent() ?? '');
        foreach (['bot', 'crawler', 'spider', 'curl', 'wget', 'python'] as $bot) {
            if (str_contains($ua, $bot)) return true;
        }

        return false;
    }

    private function detectDevice(string $ua): string
    {
        $ua = strtolower($ua);
        if (str_contains($ua, 'mobile') || str_contains($ua, 'android')) return 'mobile';
        if (str_contains($ua, 'tablet') || str_contains($ua, 'ipad')) return 'tablet';
        return 'desktop';
    }

    private function detectBrowser(string $ua): string
    {
        if (str_contains($ua, 'Edg/')) return 'Edge';
        if (str_contains($ua, 'YaBrowser')) return 'Яндекс';
        if (str_contains($ua, 'OPR') || str_contains($ua, 'Opera')) return 'Opera';
        if (str_contains($ua, 'Chrome')) return 'Chrome';
        if (str_contains($ua, 'Firefox')) return 'Firefox';
        if (str_contains($ua, 'Safari')) return 'Safari';
        return 'Other';
    }

    private function detectOs(string $ua): string
    {
        if (str_contains($ua, 'Windows')) return 'Windows';
        if (str_contains($ua, 'Mac OS')) return 'macOS';
        if (str_contains($ua, 'Android')) return 'Android';
        if (str_contains($ua, 'iPhone') || str_contains($ua, 'iPad')) return 'iOS';
        if (str_contains($ua, 'Linux')) return 'Linux';
        return 'Other';
    }
}