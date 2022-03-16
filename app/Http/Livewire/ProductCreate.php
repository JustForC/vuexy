<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $image, $price, $name, $category_id;

    public function render()
    {
        $categories = Category::get();
        return view('livewire.product-create')->with(['categories' => $categories]);
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeCreate');
        $this->clearInput();
    }

    public function clearInput(){
        $this->image = NULL;
        $this->category_id = NULL;
        $this->name = NULL;
        $this->price = NULL;
    }

    public function save(){
        $directory = '/upload/image/product/';
        $filename = time().'.'.$this->image->extension();
        $this->image->storeAs('public'.$directory, $filename);
        $path = 'storage' . $directory . $filename;

        $product = Product::create([
            'path' => $path,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'price' => $this->price,
        ]);

        $this->emit('refreshTable');
        $this->dispatchBrowserEvent('closeCreate');
        $this->clearInput();
    }
}
