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
                        <label for="recipient-name" class="col-form-label">First name:</label>
                        <input type="text" wire:model="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="recipient-name" placeholder="First name">
                        @error('first_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label">Last name:</label>
                        <input type="text" wire:model="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="recipient-name" placeholder="Last name">
                        @error('last_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                        <label for="recipient-name" class="col-form-label ">Mobile phone:</label>
                        <input type="number" wire:model="mobile_phone" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror" id="recipient-name" placeholder="Mobile phone">
                        @error('mobile_phone')
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
