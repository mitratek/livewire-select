<?php

namespace Mitratek\LivewireSelect;

use Livewire\Component;

class LivewireSelectComponent extends Component
{
    protected $listeners = ['inputSelected' => 'setSelectedData'];

    public function setSelectedData($ids)
    {
        foreach($ids as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
}