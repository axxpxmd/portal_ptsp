<?php

namespace App\Livewire;

use App\Services\WeatherService;
use Livewire\Component;

class Home extends Component
{
    public $weather;

    public function mount(WeatherService $weatherService)
    {
        $this->weather = $weatherService->getCurrentWeather();
    }

    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
