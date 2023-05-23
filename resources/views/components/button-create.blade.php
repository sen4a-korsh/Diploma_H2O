<button type="button" class="btn btn-primary" wire:click="$emit('openModal',
    '{{ $this->createLivewireComponent }}.actions.create-{{ $this->createLivewireComponent }}',
    {{ json_encode(['user' => '']) }})">
    + Create New Record
</button>
