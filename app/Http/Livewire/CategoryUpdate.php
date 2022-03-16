<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryUpdate extends Component
{
    public $categoryId, $category;

    protected $listeners = [
        'modelID'
    ];

    public function modelID($id){
        $category = Category::find($id);

        $this->categoryId = $category->id;
        $this->category = $category->name;
    }

    public function save(){
        Category::find($this->categoryId)->update([
            'name' => $this->category
        ]);

        $this->emit('refreshTable');
        $this->dispatchBrowserEvent('closeUpdate');
        $this->clearInput();
    }

    public function clearInput(){
        $this->categoryId = NULL;
        $this->category = NULL;
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeUpdate');
        $this->clearInput();
    }

    public function render()
    {
        return view('livewire.category-update');
    }
}
