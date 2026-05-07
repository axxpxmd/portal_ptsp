<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WeatherService
{
    private $apiKey;
    private $baseUrl = 'https://api.openweathermap.org/data/2.5';

    public function __construct()
    {
        $this->apiKey = config('services.openweather.api_key');
    }

    /**
     * Get current weather for a city
     *
     * @param string $city
     * @return array|null
     */
    public function getCurrentWeather($city = 'Tangerang Selatan,ID')
    {
        try {
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification for local development
            ])->get("{$this->baseUrl}/weather", [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'id'
            ]);

            if ($response->successful()) {
                $data = $response->json();

                return [
                    'temp' => round($data['main']['temp']),
                    'feels_like' => round($data['main']['feels_like']),
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => round($data['wind']['speed'] * 3.6, 1), // Convert m/s to km/h
                    'wind_deg' => $data['wind']['deg'],
                    'wind_direction' => $this->getWindDirection($data['wind']['deg']),
                    'description' => ucfirst($data['weather'][0]['description']),
                    'icon' => $this->getWeatherIcon($data['weather'][0]['icon']),
                    'location' => 'Tangerang Selatan',
                    'date' => Carbon::now()->locale('id')->isoFormat('D MMMM YYYY'),
                    'day_label' => 'Hari Ini'
                ];
            }

            return $this->getFallbackWeather();
        } catch (\Exception $e) {
            \Log::error('Weather API Error: ' . $e->getMessage());
            return $this->getFallbackWeather();
        }
    }

    /**
     * Get current weather by coordinates
     *
     * @param float $lat
     * @param float $lon
     * @return array|null
     */
    public function getCurrentWeatherByCoords($lat, $lon)
    {
        try {
            $response = Http::withOptions([
                'verify' => false, // Disable SSL verification for local development
            ])->get("{$this->baseUrl}/weather", [
                'lat' => $lat,
                'lon' => $lon,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'id'
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // Ambil nama lokasi, fallback ke 'Lokasi Anda' jika kosong/null
                $locationName = isset($data['name']) && !empty($data['name']) ? $data['name'] : 'Lokasi Anda';

                return [
                    'temp' => round($data['main']['temp']),
                    'feels_like' => round($data['main']['feels_like']),
                    'humidity' => $data['main']['humidity'],
                    'wind_speed' => round($data['wind']['speed'] * 3.6, 1), // Convert m/s to km/h
                    'wind_deg' => $data['wind']['deg'],
                    'wind_direction' => $this->getWindDirection($data['wind']['deg']),
                    'description' => ucfirst($data['weather'][0]['description']),
                    'icon' => $this->getWeatherIcon($data['weather'][0]['icon']),
                    'location' => $locationName,
                    'date' => Carbon::now()->locale('id')->isoFormat('D MMMM YYYY'),
                    'day_label' => 'Hari Ini'
                ];
            }

            return $this->getFallbackWeather();
        } catch (\Exception $e) {
            \Log::error('Weather API Error (Coords): ' . $e->getMessage());
            return $this->getFallbackWeather();
        }
    }

    /**
     * Get fallback weather data
     *
     * @return array
     */
    public function getFallbackWeather()
    {
        return [
            'temp' => 30,
            'humidity' => 72,
            'wind_speed' => 3.2,
            'wind_direction' => 'Tenggara',
            'description' => 'Sedikit Berawan',
            'icon' => 'fa-solid fa-cloud-sun',
            'location' => 'Pamulang',
            'date' => Carbon::now()->locale('id')->isoFormat('D MMMM YYYY'),
            'day_label' => 'Hari Ini'
        ];
    }

    /**
     * Convert wind degree to direction name in Indonesian
     *
     * @param float $degree
     * @return string
     */
    private function getWindDirection($degree)
    {
        $directions = [
            'Utara', 'Timur Laut', 'Timur', 'Tenggara',
            'Selatan', 'Barat Daya', 'Barat', 'Barat Laut'
        ];

        $index = round($degree / 45) % 8;
        return $directions[$index];
    }

    /**
     * Get weather icon from FontAwesome based on icon code
     *
     * @param string $iconCode
     * @return string
     */
    private function getWeatherIcon($iconCode)
    {
        $iconMap = [
            '01d' => 'fa-solid fa-sun', // clear sky day
            '01n' => 'fa-solid fa-moon', // clear sky night
            '02d' => 'fa-solid fa-cloud-sun', // few clouds day
            '02n' => 'fa-solid fa-cloud-moon', // few clouds night
            '03d' => 'fa-solid fa-cloud', // scattered clouds
            '03n' => 'fa-solid fa-cloud',
            '04d' => 'fa-solid fa-cloud', // broken clouds
            '04n' => 'fa-solid fa-cloud',
            '09d' => 'fa-solid fa-cloud-showers-heavy', // shower rain
            '09n' => 'fa-solid fa-cloud-showers-heavy',
            '10d' => 'fa-solid fa-cloud-sun-rain', // rain day
            '10n' => 'fa-solid fa-cloud-moon-rain', // rain night
            '11d' => 'fa-solid fa-cloud-bolt', // thunderstorm
            '11n' => 'fa-solid fa-cloud-bolt',
            '13d' => 'fa-solid fa-snowflake', // snow
            '13n' => 'fa-solid fa-snowflake',
            '50d' => 'fa-solid fa-smog', // mist
            '50n' => 'fa-solid fa-smog'
        ];

        return $iconMap[$iconCode] ?? 'fa-solid fa-sun';
    }
}
