<?php

namespace App\Http\Livewire\Client\Actions;

use App\Models\Client;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateClient extends ModalComponent
{
    public $first_name;
    public $last_name;
    public $mobile_phone;

    protected $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'mobile_phone' => 'required|numeric',
    ];

    public function createRecord()
    {
        $validatedData = $this->validate();

        Client::create($validatedData);

        return redirect()->route('client.index');
    }


    public function render()
    {
        return view('livewire.client.actions.create-client');
    }
}
