<?php

namespace Mitratek\LivewireSelect;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

use Mitratek\LivewireSelect\SelectInput;

class LivewireSelectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerLivewireComponents();
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-select');
    }

    protected function registerLivewireComponents()
    { 
        Livewire::component('select-input', SelectInput::class);
    }
}