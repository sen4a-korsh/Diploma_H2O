<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Record</h1>
                <button wire:click="$emit('closeModal')" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="createRecord">

                @csrf
                <div class="modal-body">
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label">Client id</label>
                        <input type="number" wire:model="client_id" name="client_id" class="form-control @error('client_id') is-invalid @enderror" id="recipient-name" placeholder="Client id">
                        @error('client_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label">Type Car Id</label>
                        <input type="number" wire:model="type_car_id" name="type_car_id" class="form-control @error('type_car_id') is-invalid @enderror" id="recipient-name" placeholder="Type Car Id">
                        @error('type_car_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label">Date Time</label>
                        <input type="datetime-local" wire:model="date_time" name="date_time" class="form-control @error('date_time') is-invalid @enderror" id="recipient-name" placeholder="Type Car Id">
                        @error('date_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label">Order Status Id</label>
                        <input type="number" wire:model="order_status_id" name="order_status_id" class="form-control @error('order_status_id') is-invalid @enderror" id="recipient-name" placeholder="Order Status Id">
                        @error('order_status_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" wire:click="$emit('closeModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div wire:click="$emit('closeModal')" tabindex="5" class="modal-backdrop fade show"></div>
