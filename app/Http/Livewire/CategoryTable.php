<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    public $modelId, $mode;

    public $sortType = "asc";
    public $sortName = "id";

    public $searchKey;
    
    protected $listeners = [
        'refreshTable' => '$refresh'
    ];

    public function render()
    {
        $categories = Category::where('id' , 'LIKE', '%'.$this->searchKey.'%')
                                ->orWhere('name', 'LIKE', '%'.$this->searchKey.'%')
                                ->orderBy($this->sortName, $this->sortType)
                                ->paginate(5);
        return view('livewire.category-table')->with(['categories' => $categories]);
    }

    public function select($id, $mode){
        $this->modelId = $id;
        $this->mode = $mode;

        if($this->mode == 'update'){
            $this->emit('modelID', $this->modelId);
            $this->dispatchBrowserEvent('showUpdate');
        }
        else{
            $this->emit('deleteID', $this->modelId);
            $this->dispatchBrowserEvent('showDelete');
        }
    }

    public function sorting($column){
        $this->sortName = $column;
        if($this->sortType == "asc"){
            $this->sortType = "desc";
        }
        else{
            $this->sortType = "asc";
        }
    }
}
