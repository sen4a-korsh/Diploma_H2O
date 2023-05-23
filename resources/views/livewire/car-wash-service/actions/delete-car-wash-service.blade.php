<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you shure?</h1>
                <button wire:click="$emit('closeModal')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 class="text-secondary">Do you really want to delete record <b>#{{ isset($car_wash_service) ? ($car_wash_service->id) : '' }}</b>? This process cannot be undone!</h6>
            </div>
            <div class="modal-footer">
                <form action="{{ route('car-wash-service.delete', ['id' => $car_wash_service->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-secondary" type="button" wire:click="$emit('closeModal')">Cancel</button>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div wire:click="$emit('closeModal')" tabindex="5" class="modal-backdrop fade show"></div>
