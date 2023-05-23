<?php

namespace App\Http\Livewire\Client\Actions;

use App\Models\Client;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteClient extends ModalComponent
{
    public $client;

    public function mount($id_client)
    {
        $this->client = Client::find($id_client);
    }

    public function render()
    {
       return view('livewire.client.actions.delete-client');
    }
}
