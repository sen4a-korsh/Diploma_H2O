<?php

namespace App\Http\Livewire\Order\Actions;

use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteOrder extends ModalComponent
{
    public $order;

    public function mount($id_order)
    {
        $this->order = Order::find($id_order);
    }

    public function render()
    {
        return view('livewire.order.actions.delete-order');
    }
}
