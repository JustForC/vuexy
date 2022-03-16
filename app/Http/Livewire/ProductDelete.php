<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDelete extends Component
{
    public $modelId,$name;

    protected $listeners = [
        'deleteID'
    ];

    public function deleteID($id){
        $this->modelId = $id;
        $product = Product::find($this->modelId);
        $this->modelId = $product->id;
        $this->name = $product->name;
    }

    public function delete(){
        Product::find($this->modelId)->delete();
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
        return view('livewire.product-delete');
    }
}
