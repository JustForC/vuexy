<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use DB;
use App\Models\Category;

class ProductTable extends Component
{
    
    use WithPagination;

    public $modelId, $mode;

    public $sortType = "asc";
    public $sortName = "id";
    public $paginationKey = 5;

    public $searchKey, $filterCategory;

    public function render()
    {
        $categories = Category::get();
        if(isset($this->filterCategory) && $this->filterCategory != "All" && $this->searchKey == NULL){
            $products = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('categories.name', '=', $this->filterCategory)
                            ->orderBy($this->sortName, $this->sortType)
                            ->select('products.*', 'categories.name as category')
                            ->paginate($this->paginationKey);
        }
        elseif($this->filterCategory == "All" || $this->filterCategory == NULL || isset($this->searchKey)){
            $products = DB::table('products')
                            ->join('categories', 'products.category_id', '=', 'categories.id')
                            ->where('products.name', 'LIKE', '%'.$this->searchKey.'%')
                            ->orWhere('products.price', 'LIKE', '%'.$this->searchKey.'%')
                            ->orWhere('categories.name', 'LIKE', '%'.$this->searchKey.'%')
                            ->orderBy($this->sortName, $this->sortType)
                            ->select('products.*', 'categories.name as category')
                            ->paginate($this->paginationKey);
        }
        return view('livewire.product-table')->with(['products' => $products, 'categories' => $categories]);
    }
    
    protected $listeners = [
        'refreshTable' => '$refresh'
    ];  

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
