<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;

class ProductUpdate extends Component
{
    use WithFileUploads;

    public $image, $price, $name, $category_id, $path;
    public $productID;

    protected $listeners = [
        'modelID'
    ];

    public function modelID($id){
        $this->productID = $id;
        $product = Product::find($this->productID);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->path = $product->path;
    }

    public function closeModal(){
        $this->dispatchBrowserEvent('closeUpdate');
        $this->clearInput();
    }

    public function clearInput(){
        $this->productID = NULL;
        $this->image = NULL;
        $this->price = NULL;
        $this->name = NULL;
        $this->category_id = NULL;
        $this->path = NULL;
    }

    public function save(){
        if(isset($this->image)){
            $directory = '/upload/image/product/';
            $filename = time().'.'.$this->image->extension();
            $this->image->storeAs('public'.$directory, $filename);
            $path = 'storage' . $directory . $filename;
    
            $product = Product::find($this->productID)->update([
                'path' => $path,
                'name' => $this->name,
                'category_id' => $this->category_id,
                'price' => $this->price,
            ]);

            $this->emit('refreshTable');
            $this->dispatchBrowserEvent('closeUpdate');
            $this->clearInput();
        }
        else{
            $product = Product::find($this->productID)->update([
                'path' => $this->path,
                'name' => $this->name,
                'category_id' => $this->category_id,
                'price' => $this->price,
            ]);

            $this->emit('refreshTable');
            $this->dispatchBrowserEvent('closeUpdate');
            $this->clearInput();
        }
    }

    public function render()
    {
        $categories = Category::get();
        return view('livewire.product-update')->with(['categories' => $categories]);
    }
}
