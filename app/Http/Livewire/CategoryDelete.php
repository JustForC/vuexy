<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryDelete extends Component
{
    public $modelId,$name;

    protected $listeners = [
        'deleteID'
    ];

    public function deleteID($id){
        $category = Category::find($id);
        $this->modelId = $category->id;
        $this->name = $category->name;
    }

    public function delete(){
        Category::find($this->modelId)->delete();
        $this->emit('refreshTable');
        $this->dispatchBrowserEvent('closeDelete');
        $this->clearId();
    }

    public function clearId(){
        $this->modelId = NULL;
        $this->name = NULL;
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeDelete');
        $this->clearId();
    }

    public function render()
    {
        return view('livewire.category-delete');
    }
}
