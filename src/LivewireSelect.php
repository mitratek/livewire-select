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
        }
    }
    
    public function resetLivewireSelect()
    {
        $this->emit('resetLivewireSelect');
    }
}