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
                        <label for="recipient-name" class="col-form-label ">Type Name:</label>
                        <input type="text" wire:model="type_name" name="type_name" class="form-control @error('type_name') is-invalid @enderror" id="recipient-name" placeholder="Type Name">
                        @error('type_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label ">Lead Time:</label>
                        <input type="time" wire:model="lead_time" name="lead_time" class="form-control @error('lead_time') is-invalid @enderror" id="recipient-name" placeholder="Lead Time">
                        @error('lead_time')
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
