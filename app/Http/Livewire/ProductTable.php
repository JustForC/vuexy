<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ProductTable extends Component
{
    
    use WithPagination;

    public $modelId, $mode;

    public $sortType = "asc";
    public $sortName = "id";
    public $paginationKey = 5;

    public $searchKey;

    public function render()
    {
        $products = DB::table('products')
                        ->join('categories', 'products.category_id', '=', 'categories.id')
                        ->where('products.name', 'LIKE', '%'.$this->searchKey.'%')
                        ->orWhere('products.price', 'LIKE', '%'.$this->searchKey.'%')
                        ->orWhere('categories.name', 'LIKE', '%'.$this->searchKey.'%')
                        ->orderBy($this->sortName, $this->sortType)
                        ->select('products.*', 'categories.name as category')
                        ->paginate($this->paginationKey);
        return view('livewire.product-table')->with(['products' => $products]);
    }
    
    protected $listeners = [
        'refreshTable' => '$refresh'
    ];  

    public function select($id, $mode){
        $this->modelId = $id;
        $this->mode = $mode;
        // dd($id);
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
