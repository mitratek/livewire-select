<?php

namespace Mitratek\LivewireSelect;

use Livewire\Component;

class SelectInput extends Component
{
    public $name;
    public $model;
    public $search;
    public $show;
    public $min;
    public $placeholder;

    public $dataList = [];

    public $queryData;
    public $isSelected = 0;
    public $parent;
    public $parentId;
    public $message = null;

    protected $listeners = ['inputSelected' => 'setChildrenOption'];

    public function mount($name, $model, $search, $show, $min=0, $placeholder=null, $parent=null)
    {
        $this->name = $name;
        $this->model = $model;
        $this->search = json_decode($search);
        $this->show = $show;
        $this->min = $min;
        $this->placeholder = $placeholder;

        $this->parent = $parent;
    }

    public function setChildrenOption($ids)
    {
        if(isset($this->parent))
        {
            $this->isSelected = 0;
            $this->parentId = $ids;
                                
            $this->getQueryData();
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
        if(isset($this->min) and strlen($this->queryData) < $this->min)
        {
            return $this->message = "Please enter ".$this->min." or more characters";
        }
        else
        {
            $this->message = null;
        }

        $this->isSelected = 0;
        $dataList = $this->model::query();

        // search for related column
        foreach($this->search as $column)
        {
            $dataList = $dataList->orWhere($column, 'like', '%' . $this->queryData . '%');
        }
        
        // check if parent is exists
        if(isset($this->parent))
        {
            $dataList = $dataList->where($this->parent, $this->parentId);
        }
        
        $this->dataList = $this->buildOptions($dataList->get());
    }

    protected function buildOptions($dataList)
    {
        // check text inside $this->show that contains bracket {...}
        preg_match_all('#\{(.*?)\}#', $this->show, $columns);

        // build id and value for select option
        $results = $dataList->map(function($value, $key) use($columns){
            $data['id'] = $value->id;
            
            $text = $this->show;
            foreach($columns[1] as $key => $column)
            {
                $text = str_replace($columns[0][$key], $value->{$columns[1][$key]}, $text);
            }

            $data['value'] = $text;

            return $data;
        });

        return $results;
    }

    public function getValue($id, $value)
    {
        $this->queryData = $value;
        $this->isSelected = 1;

        $this->emit('inputSelected', [$this->name => $id]);
    }
}
