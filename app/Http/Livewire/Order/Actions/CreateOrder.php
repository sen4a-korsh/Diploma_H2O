<?php

namespace App\Http\Livewire\Order\Actions;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateOrder extends ModalComponent
{
    public $client_id;
    public $type_car_id;
    public $date_time;
    public $order_status_id;

    protected $rules = [
        'client_id' => 'required|integer|exists:clients,id',
        'type_car_id' => 'required|integer|exists:type_cars,id',
        'date_time' => 'required',
        'order_status_id' => 'required|integer|exists:order_statuses,id',
    ];

    public function createRecord()
    {
        $validatedData = $this->validate();

        Order::create($validatedData);

        return redirect()->route('order.index');
    }

    public function render()
    {
        return view('livewire.order.actions.create-order', );
    }
}
