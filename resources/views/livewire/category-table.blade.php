<div>
    <fieldset class="col-xl-3 form-group position-relative has-icon-left float-right">
        <input wire:model="searchKey" type="text" class="form-control round" id="searchbar">
        <div class="form-control-position">
            <i class="feather icon-search px-1"></i>
        </div>
    </fieldset>
    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th wire:click="sorting('id')">ID <span class="float-right"><i class="ficon fa fa-arrow-up @if($sortType == "desc" || $sortName != "id") fade @endif"></i><i class="ficon fa fa-arrow-down @if($sortType == "asc" || $sortName != "id") fade @endif"></i></span></th>
                    <th wire:click="sorting('name')">Name <span class="float-right"><i class="ficon fa fa-arrow-up @if($sortType == "desc" || $sortName != "name") fade @endif"></i><i class="ficon fa fa-arrow-down @if($sortType == "asc" || $sortName != "name") fade @endif"></i></span></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>
                        <button wire:click="select({{$category->id}}, 'update')" type="button" class="btn btn-info">Edit</button>
                        <button wire:click="select({{$category->id}}, 'delete')" type="button" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$categories->links()}}
    </div>
</div>
