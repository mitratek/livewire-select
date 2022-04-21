<?php

namespace Mitratek\LivewireSelect\View\Components;

use Illuminate\View\Component;

class LoadingIndicator extends Component
{
    public function render()
    {
        return view('livewire-select::components.loading-indicator');
    }
}