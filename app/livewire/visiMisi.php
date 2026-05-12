<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class VisiMisi extends Component
{
    public function render(): View
    {
        return view('livewire.visi-misi')
            ->layout('layouts.app');
    }
}
