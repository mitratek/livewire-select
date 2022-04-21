<?php

namespace Mitratek\LivewireSelect;

use Livewire\Component;

class SelectInput extends Component
{
    public $model;
    public $placeholder;
    public $dataId;
    public $dataList = [];

    public $queryData;
    public $isSelected = 0;
    public $parent;
    public $parentId;

    protected $listeners = ['inputSelected' => 'setChildrenOption'];

    public function mount($dataId, $model, $placeholder, $parent=null)
    {
        $this->dataId = $dataId;
        $this->model = $model;
        $this->placeholder = $placeholder;
        $this->parent = $parent;
    }

    public function setChildrenOption($ids)
    {
        if(isset($this->parent))
        {
            $this->isSelected = 0;
            $this->parentId = $ids;
            $this->dataList = $this->model::where('name', 'like', '%' . $this->queryData . '%')
                                            ->where($this->parent, $ids)
                                            ->get();
        }
    }

    public function render()
    {
        return view('livewire-select::select-input');
    }

    public function updatedQueryData()
    {
        $this->getQueryData();
    }

    public function getQueryData()
    {
        $this->isSelected = 0;
        
        if(isset($this->parent))
        {
            $this->dataList = $this->model::where('name', 'like', '%' . $this->queryData . '%')
                                            ->where($this->parent, $this->parentId)
                                            ->get();
        }
        else
        {
            $this->dataList = $this->model::where('name', 'like', '%' . $this->queryData . '%')->get();
        }
    }

    public function getValue($id, $value)
    {
        $this->queryData = $value;
        $this->isSelected = 1;

        $this->emit('inputSelected', [$this->dataId => $id]);
    }
}
