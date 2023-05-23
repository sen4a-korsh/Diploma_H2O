<?php

namespace App\Http\Livewire\CarWashService\Actions;

use App\Models\CarWashService;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CreateCarWashService extends ModalComponent
{
    public $name;
    public $price;

    protected $rules = [
        'name' => 'required|min:2|max:255',
        'price' => 'required|numeric'
    ];

    public function createRecord()
    {
        $validatedData = $this->validate();

        CarWashService::create($validatedData);

        return redirect()->route('car-wash-service.index');
    }

    public function render()
    {
        return view('livewire.car-wash-service.actions.create-car-wash-service');
    }
}
