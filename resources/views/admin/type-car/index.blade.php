@extends('admin.layouts.livewire-table-container')

@section('livewire-table')

    <livewire:type-car.type-car-table/>
    @livewire('livewire-ui-modal')
@endsection

