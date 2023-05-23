<?php

namespace App\Http\Livewire\CarWashService\Actions;

use App\Models\CarWashService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteCarWashService extends ModalComponent
{
    public $car_wash_service;

    public function mount($id_car_wash_service)
    {
        $this->car_wash_service = CarWashService::find($id_car_wash_service);
    }

    public function render()
    {
        return view('livewire.car-wash-service.actions.delete-car-wash-service');
    }
}
