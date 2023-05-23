<?php

namespace App\Http\Livewire\TypeCar\Actions;

use App\Models\TypeCar;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DeleteTypeCar extends ModalComponent
{
    public $type_car;

    public function mount($id_type_car)
    {
        $this->type_car = TypeCar::find($id_type_car);
    }


    public function render()
    {
        return view('livewire.type-car.actions.delete-type-car');
    }
}
