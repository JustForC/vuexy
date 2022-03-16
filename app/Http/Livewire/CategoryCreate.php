<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCreate extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.category-create');
    }

    public function save(){
        Category::create([
            'name' => $this->category,
        ]);

        $this->emit('refreshTable');
        $this->dispatchBrowserEvent('closeCreate');
        $this->clearInput();
    }

    public function clearInput(){
        $this->category = NULL;
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeCreate');
        $this->clearInput();
    }
}
