<div>
    <div>
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Add Product</h4>
            <button type="button" class="close" wire:click="closeModal()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-xl">
                <fieldset class="form-group">
                    <label for="basicInputFile">Product Image</label>
                    <div class="custom-file">
                        <input wire:model="image" type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label for="basicInput">Product</label>
                    <input wire:model="name" type="text" class="form-control" id="basicInput" placeholder="Enter Product Name">
                </fieldset>
                <fieldset class="form-group">
                    <label for="basicInput">Price</label>
                    <input wire:model="price" type="number" class="form-control" id="basicInput" placeholder="Enter Product Price">
                </fieldset>
                <fieldset class="form-group">
                    <label for="basicSelect">Category</label>
                    <select wire:model="category_id" class="form-control" id="basicSelect">
                        <option>Select Product Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" wire:click="closeModal()">Cancel</button>
            <button wire:click="save()" type="button" class="btn btn-success">Save</button>
        </div>
    </div>
    
</div>
