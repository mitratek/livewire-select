<?php

namespace Mitratek\LivewireSelect;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

use Mitratek\LivewireSelect\SelectInput;
use Mitratek\LivewireSelect\View\Components\LoadingIndicator;

class LivewireSelectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerViewComponents();
        $this->registerLivewireComponents();
    }

    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'livewire-select');
    }

    protected function registerViewComponents()
    {
        Blade::component('loading-indicator', LoadingIndicator::class);
    }

    protected function registerLivewireComponents()
    { 
        Livewire::component('select-input', SelectInput::class);
    }
}