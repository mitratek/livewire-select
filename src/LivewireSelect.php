<?php

namespace Mitratek\LivewireSelect;

trait LivewireSelect
{
    public function initializeLivewireSelect()
    {
        $this->listeners = array_merge($this->listeners, [
            'inputSelected' => 'setSelectedData'
        ]);
    }

    public function setSelectedData($ids)
    {
        foreach($ids as $key => $value)
        {
            $this->{$key} = $value;

            // call livewire class hook when specific property updated
            $this->{'updated'.ucwords($key)}();
        }

        
    }
}