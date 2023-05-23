<?php

namespace App\Http\Livewire\OrderStatus\Actions;

use App\Models\OrderStatus;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteOrderStatus extends ModalComponent
{
    public $order_status;

    public function mount($id_order_status)
    {
        $this->order_status = OrderStatus::find($id_order_status);
    }

    public function render()
    {
        return view('livewire.order-status.actions.delete-order-status');
    }
}
