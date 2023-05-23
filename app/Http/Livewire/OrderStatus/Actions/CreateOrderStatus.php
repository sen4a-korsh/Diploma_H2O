<?php

namespace App\Http\Livewire\OrderStatus\Actions;

use App\Models\OrderStatus;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateOrderStatus extends ModalComponent
{
    public $status_name;

    protected $rules = [
        'status_name' => 'required|min:2|max:255',
    ];

    public function createRecord()
    {
        $validatedData = $this->validate();

        OrderStatus::create($validatedData);

        return redirect()->route('order-status.index');
    }

    public function render()
    {
        return view('livewire.order-status.actions.create-order-status');
    }
}
