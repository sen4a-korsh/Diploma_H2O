<?php

namespace App\Http\Livewire\TypeCar\Actions;

use App\Models\TypeCar;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateTypeCar extends ModalComponent
{
    public $type_name;
    public $lead_time;

    protected $rules = [
        'type_name' => 'required|min:2|max:255',
        'lead_time' => 'required',
    ];

    public function createOrder()
    {
        $validatedData = $this->validate();

        TypeCar::create($validatedData);

        return redirect()->route('type-car.index');
    }

    public function render()
    {
        return view('livewire.type-car.actions.create-type-car');
    }
}
