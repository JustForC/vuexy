<div>
    <div>
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Edit Category</h4>
            <button type="button" class="close" wire:click="closeModal()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="col-xl">
                <fieldset class="form-group">
                    <label for="basicInput">Category</label>
                    <input wire:model="category" type="text" class="form-control" id="basicInput" placeholder="Enter Category">
                </fieldset>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" wire:click="closeModal()">Cancel</button>
            <button wire:click="save()" type="button" class="btn btn-success">Save</button>
        </div>
    </div>
</div>
