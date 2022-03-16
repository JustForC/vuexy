<div>
    <div>
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel1">Delete Category</h4>
            <button type="button" class="close" wire:click="closeModal()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Delete category {{$name}}?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" wire:click="closeModal()">Cancel</button>
            <button wire:click="delete()" type="button" class="btn btn-danger">Delete</button>
        </div>
    </div>
    
</div>
